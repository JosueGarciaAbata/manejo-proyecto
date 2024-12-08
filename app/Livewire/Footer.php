<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public $settings;

    public $listeners = [
        'updateAuthorFooter' => '$refresh'
    ];

    // public function mount(){
    //     $this->settings = Settings::find(1);
    // }

    public function render()
    {
        return view('livewire.footer');
    }
}