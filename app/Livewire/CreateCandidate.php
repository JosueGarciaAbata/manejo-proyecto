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
    public $name, $last_name, $position, $entry_date, $description, $id_pol_par_bel, $ruta_can;

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
            'ruta_can' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_pol_par_bel' => 'required|exists:political_parties,id_lis',
        ]);

        // Si no se proporciona imagen, usar la predeterminada
        $image_path = $this->ruta_can
            ? $this->ruta_can->store('assets/images/candidates', 'public')
            : 'assets/images/candidates/default.png';

        Candidate::create([
            'nom_can' => $this->name,
            'ape_can' => $this->last_name,
            'car_can' => $this->position,
            'fec_ing_can' => $this->entry_date,
            'descrip_can' => $this->description,
            'id_pol_par_bel' => $this->id_pol_par_bel,
            'ruta_can' => $image_path,
        ]);

        $this->reset(['name', 'last_name', 'position', 'entry_date', 'description', 'id_pol_par_bel', 'ruta_can']);
        $this->closeModal();
        $this->dispatch('render');

        session()->flash('message', 'Candidato agregado exitosamente.');
    }

    public function render()
    {
        $politicalParties = PoliticalParty::all();
        return view('livewire.create-candidate', compact('politicalParties'));
    }
}
