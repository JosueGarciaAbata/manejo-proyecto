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
    public $nom_can, $ape_can, $car_can, $fec_ing_can, $descrip_can, $id_pol_par_bel, $image;

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
        ]);

        // Si no se proporciona imagen, usar la predeterminada
        $image_path = $this->image
            ? $this->image->store('images/candidates', 'public')
            : 'images/candidates/default.png';

        Candidate::create([
            'nom_can' => $this->nom_can,
            'ape_can' => $this->ape_can,
            'car_can' => $this->car_can,
            'fec_ing_can' => $this->fec_ing_can,
            'descrip_can' => $this->descrip_can,
            'id_pol_par_bel' => $this->id_pol_par_bel,
            'ruta_can' => $image_path,
        ]);

        $this->reset(['nom_can', 'ape_can', 'car_can', 'fec_ing_can', 'descrip_can', 'id_pol_par_bel', 'image']);
        $this->closeModal();
        $this->dispatch('render');

    }

    public function render()
    {
        $politicalParties = PoliticalParty::all();
        return view('livewire.create-candidate', compact('politicalParties'));
    }
}
