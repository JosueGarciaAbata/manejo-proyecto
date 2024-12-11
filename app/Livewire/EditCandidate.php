<?php

namespace App\Livewire;
use App\Models\Candidate;

use Livewire\Component;

class EditCandidate extends Component
{
    public $isOpen = false;

    public $candidate = [];

    protected $rules = [
        'candidate.nom_can' => 'required|string|max:255',
        'candidate.ape_can' => 'required|string|max:255',
        'candidate.ruta_can' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'candidate.car_can' => 'required|string|max:255',
        'candidate.fec_ing_can' => 'required|date',
        'candidate.descrip_can' => 'nullable|string|max:1000',
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
    }

    public function editCandidate()
    {
        $this->validate(); // Esto aplica las reglas definidas en $rules

        // Verificar si se ha subido un archivo de imagen
        if ($this->candidate['ruta_can']) {
            // Guardar la nueva imagen en la carpeta especificada
            $path = $this->ruta_can->store('assets/images/candidates', 'public');
            $this->candidate['ruta_can'] = $path; // Actualizar la ruta en el modelo
        } elseif (empty($this->candidate['ruta_can'])) {
            // Si no hay nueva imagen ni ruta existente, asignar una imagen por defecto
            $this->candidate['ruta_can'] = 'assets/images/candidates/default.png';
        }

        // Guardar los datos en la base de datos
        Candidate::updateOrCreate(
            ['id_can' => $this->candidate['id_can'] ?? null], // Usar el ID si existe para actualizar
            $this->candidate
        );

        // Limpiar el formulario y cerrar el modal
        $this->reset(['candidate']);
        $this->closeModal();
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.edit-candidate');
    }
}
