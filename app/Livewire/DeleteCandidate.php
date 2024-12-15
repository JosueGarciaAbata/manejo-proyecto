<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;

class DeleteCandidate extends Component
{
    public $isOpen = false;
    public $candidate = [];

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

    public function deleteCandidate()
    {
        Candidate::find($this->candidate['id_can'])->delete();

        $this->dispatch('render');

        $this->closeModal();
        session()->flash('message', 'Candidato eliminado correctamente.');
    }

    public function render()
    {
        return view('livewire.delete-candidate');
    }
}
