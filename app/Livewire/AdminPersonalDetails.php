<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class AdminPersonalDetails extends Component
{

    public $author;
    public $name, $username, $email, $biography;

    protected $listeners = [
        'updateAuthorPersonalDetails' => '$refresh'
    ];

    public function mount()
    {
        $this->author = User::find(auth('web')->id());
        $this->name = $this->author->name;
        $this->username = $this->author->username;
        $this->email = $this->author->email;
    }
    public function render()
    {
        return view('livewire.admin-personal-details');
    }

    public function UpdateDetails()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users,username,' . auth('web')->id()
        ]);

        User::where('id', auth('web')->id())->update([
            'name' => $this->name,
            'username' => $this->username,
        ]);

        //$this->emit('updateAuthorProfileHeader');
        //$this->emit('updateAuthorPersonalDetails');
        //$this->emit('updateAuthorChangePasswordForm');
        $this->dispatch('updateTopHeader');
        $this->showToastr('¡Profile updated correctly! 😊👌', 'success');
        return redirect()->route('admin.profile');
    }

    public function showToastr($message, $type)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}