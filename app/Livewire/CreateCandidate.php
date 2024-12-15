<?php

namespace App\Livewire;

use App\Models\PoliticalParty;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Candidate;

class CreateCandidate extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $nom_can, $ape_can, $car_can, $fec_ing_can, $descrip_can, $id_pol_par_bel, $image, $jerarquia;

    // Arrays dinámicos para experiencias, educación y redes sociales
    public $experiences = [];
    public $newExperience = ''; // Input temporal

    public $newEducation = ''; // Input temporal para la nueva educación
    public $educations = [];   // Array para almacenar la lista de educación

    // Agregar experiencia al array
    public function addExperience()
    {
        if (!empty($this->newExperience)) {
            $this->experiences[] = $this->newExperience;
            $this->newExperience = ''; // Limpiar el input temporal
        }
    }

    // Eliminar una experiencia específica
    public function removeExperience($index)
    {
        if (isset($this->experiences[$index])) {
            unset($this->experiences[$index]);
            $this->experiences = array_values($this->experiences); // Reindexar el array
        }
    }

    // Método para agregar educación
    public function addEducation()
    {
        if (!empty($this->newEducation)) {
            $this->educations[] = $this->newEducation;
            $this->newEducation = ''; // Limpiar el input temporal
        }
    }

    // Método para eliminar una educación específica
    public function removeEducation($index)
    {
        if (isset($this->educations[$index])) {
            unset($this->educations[$index]);
            $this->educations = array_values($this->educations); // Reindexar el array
        }
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function saveCandidate()
    {
        $this->validate([
            'nom_can' => 'required|string|max:255',
            'ape_can' => 'required|string|max:255',
            'car_can' => 'required|string|max:255',
            'fec_ing_can' => 'required|date',
            'descrip_can' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_pol_par_bel' => 'required|exists:political_parties,id_lis',
            'jerarquia' => 'required|in:lider,sublider,integrante',
        ]);

        // Si no se proporciona imagen, usar la predeterminada
        $image_path = $this->image
            ? $this->image->store('images/candidates', 'public')
            : 'images/candidates/default.png';

        $candidate = Candidate::create([
            'nom_can' => $this->nom_can,
            'ape_can' => $this->ape_can,
            'car_can' => $this->car_can,
            'fec_ing_can' => $this->fec_ing_can,
            'descrip_can' => $this->descrip_can,
            'id_pol_par_bel' => $this->id_pol_par_bel,
            'ruta_can' => $image_path,
            'jerarquia' => $this->jerarquia,
        ]);

        // Guardar las experiencias.
        foreach ($this->experiences as $experience) {
            $candidate->professionalExperiences()->create([
                "nom_exp" => $experience,
            ]);
        }

        // Guarda la formación
        foreach ($this->educations as $education) {
            $candidate->educationalBackgrounds()->create([
                "nom_edu" => $education,
            ]);
        }

        $this->reset([
            'nom_can',
            'ape_can',
            'car_can',
            'fec_ing_can',
            'descrip_can',
            'id_pol_par_bel',
            'image',
            'experiences',
            'educations'
        ]);
        $this->closeModal();
        $this->dispatch('render');

    }

    public function render()
    {
        $politicalParties = PoliticalParty::all();
        return view('livewire.create-candidate', compact('politicalParties'));
    }
}
