<?php

namespace App\Livewire;
use App\Models\Candidate;
use Livewire\WithFileUploads; // Importar el trait necesario

use Livewire\Component;

class EditCandidate extends Component
{
    use WithFileUploads;
    public $isOpen = false;

    public $candidate = [];

    public $ruta_can; // Propiedad separada para el archivo

    protected $rules = [
        'candidate.nom_can' => 'required|string|max:255',
        'candidate.ape_can' => 'required|string|max:255',
        'candidate.car_can' => 'required|string|max:255',
        'candidate.fec_ing_can' => 'required|date',
        'candidate.descrip_can' => 'nullable|string|max:1000',
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
    }

    public function editCandidate()
    {
        $this->validate(); // Validar los datos

        // Verificar si se ha subido un archivo de imagen
        if ($this->ruta_can) {
            // Guardar la nueva imagen en la carpeta especificada
            $path = $this->ruta_can->store('assets/images/candidates', 'public');
            $this->candidate['ruta_can'] = $path; // Actualizar la ruta en el arreglo
        } elseif (empty($this->candidate['ruta_can'])) {
            // Si no hay nueva imagen ni ruta existente, asignar una imagen por defecto
            $this->candidate['ruta_can'] = 'assets/images/candidates/default.png';
        }

        if (!empty($this->candidate['id_can'])) {
            Candidate::find($this->candidate['id_can'])->update($this->candidate);
        }

        // Limpiar el formulario y cerrar el modal
        $this->reset(['candidate', 'ruta_can']);
        $this->closeModal();
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.edit-candidate');
    }
}
