<?php

namespace App\Livewire;

use App\Models\PoliticalParty;
use Livewire\Component;
use App\Models\Candidate;

class CreateCandidate extends Component
{
    public $isOpen = false;
    public $name, $last_name, $position, $entry_date, $description, $id_pol_par_bel;

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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'entry_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'id_pol_par_bel' => 'required|exists:political_parties,id_lis',
        ]);

        Candidate::create([
            'nom_can' => $this->name,
            'ape_can' => $this->last_name,
            'car_can' => $this->position,
            'fec_ing_can' => $this->entry_date,
            'descrip_can' => $this->description,
            'id_pol_par_bel' => $this->id_pol_par_bel
        ]);

        $this->reset(['name', 'last_name', 'position', 'entry_date', 'description', 'id_pol_par_bel']);
        $this->closeModal();

        session()->flash('message', 'Candidato agregado exitosamente.');
    }

    public function render()
    {
        $politicalParties = PoliticalParty::all();
        return view('livewire.create-candidate', compact('politicalParties'));
    }
}
