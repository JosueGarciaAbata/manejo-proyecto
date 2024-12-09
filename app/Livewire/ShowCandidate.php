<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\On;

class ShowCandidate extends Component
{

    #[On('render')]
    public function render()
    {
        $candidates = Candidate::paginate(10);
        return view('livewire.show-candidate', compact('candidates'));
    }
}
