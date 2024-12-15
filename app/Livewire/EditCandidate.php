<?php

namespace App\Livewire;
use App\Models\Candidate;
use Livewire\WithFileUploads; // Importar el trait necesario
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class EditCandidate extends Component
{
    use WithFileUploads;
    public $isOpen = false;

    public $candidate = [];
    public $jerarquia;

    public $ruta_can; // Propiedad separada para el archivo

    // Experiencias dinámicas
    public $experiences = [];
    public $newExperience = '';

    public $educations = [];
    public $newEducation = '';

    protected $rules = [
        'candidate.nom_can' => 'required|string|max:255',
        'candidate.ape_can' => 'required|string|max:255',
        'candidate.car_can' => 'required|string|max:255',
        'candidate.fec_ing_can' => 'required|date',
        'candidate.descrip_can' => 'nullable|string|max:1000',
        'jerarquia' => 'required|in:lider,sublider,integrante',
        'ruta_can' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validación para el archivo
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function mount(Candidate $candidate)
    {
        $this->candidate = $candidate->toArray();
        $this->candidate['id_can'] = $candidate->id_can; // Asegurar el ID

        // Cargar la jerarquía
        $this->jerarquia = $candidate->jerarquia;

        // Cargar las experiencias y educaciones relacionadas
        $this->experiences = $candidate->professionalExperiences()->pluck('nom_exp', 'id_exp')->toArray();
        $this->educations = $candidate->educationalBackgrounds()->pluck('nom_edu', 'id_edu')->toArray();
    }

    // Agregar nueva experiencia temporal
    public function addExperience()
    {
        if (!empty($this->newExperience)) {
            $this->experiences[] = $this->newExperience;
            $this->newExperience = '';
        }
    }

    // Eliminar una experiencia temporal
    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }


    public function addEducation()
    {
        if (!empty($this->newEducation)) {
            $this->educations[] = $this->newEducation;
            $this->newEducation = '';
        }
    }

    public function removeEducation($index)
    {
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations);
    }

    public function editCandidate()
    {
        $this->validate(); // Validar los datos


        // Verificar si se ha subido una nueva imagen
        if ($this->ruta_can) {
            // Guardar la nueva imagen en la carpeta especificada
            $newPath = $this->ruta_can->store('images/candidates', 'public');

            // Eliminar la imagen anterior si existe y no es la predeterminada
            if (!empty($this->candidate['ruta_can']) && $this->candidate['ruta_can'] !== 'images/candidates/default.png') {
                \Storage::disk('public')->delete($this->candidate['ruta_can']);
            }

            // Actualizar la ruta en el arreglo para guardarla en la base de datos
            $this->candidate['ruta_can'] = $newPath;
        }

        $this->candidate['jerarquia'] = $this->jerarquia;
        $candidate = Candidate::find($this->candidate['id_can']);
        $candidate->update($this->candidate);

        // Actualizar experiencias: borrar existentes y reinsertar
        $candidate->professionalExperiences()->delete();
        foreach ($this->experiences as $experience) {
            $candidate->professionalExperiences()->create([
                'nom_exp' => $experience,
            ]);
        }

        // Actualizar educación
        $candidate->educationalBackgrounds()->delete();
        foreach ($this->educations as $education) {
            $candidate->educationalBackgrounds()->create(['nom_edu' => $education]);
        }

        // Limpiar el formulario y cerrar el modal
        $this->reset(['ruta_can']);
        $this->closeModal();
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.edit-candidate');
    }
}
