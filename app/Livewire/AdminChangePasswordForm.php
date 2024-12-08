<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminChangePasswordForm extends Component
{
    public function render()
    {
        return view('livewire.admin-change-password-form');
    }
    public $current_password, $new_password, $confirm_new_password;

    protected $listeners = [
        'updateAuthorChangePasswordForm' => '$refresh'
    ];

    public function ChangePassword()
    {
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, User::find(auth('web')->id())->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password' => [
                'required',
                'min:5',
                'max:25',
                function ($attribute, $value, $fail) {
                    if (Hash::check($value, User::find(auth()->id())->password)) {
                        return $fail(__('The new password cannot be the same as the current password.'));
                    }
                }
            ],
            'confirm_new_password' => 'required|same:new_password'
        ], [
            'current_password.required' => 'Enter your current password',
            'new_password.required' => 'Enter a new password',
            'confirm_new_password.same' => 'The passwords do not match'
        ]);

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
            $this->current_password = $this->new_password = $this->confirm_new_password = null;
            $this->showToastr('success', '¡Your password has been successfully update.! ✨');
        } else {
            $this->showToastr('error', '¡Something went wrong.! 😨');
        }
    }

    public function showToastr($type, $message)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message,
        ]);
    }

}