<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class UserLoginForm extends Component
{

    public $login_id;
    public $password;
    public $retunUrl;

    public function mount()
    {
        $this->retunUrl = request()->returnUrl;
    }
    public function render()
    {
        return view('livewire.user-login-form');
    }

    public function LoginHandler()
    {
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {

            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ], [
                'login_id.required' => 'Se requiere el correo electrónico o el nombre de usuario',
                'login_id.email' => 'Dirección de correo electrónico inválida',
                'login_id.exists' => 'Este correo electrónico no está registrado',
                'password.required' => 'Se requiere la contraseña',
            ]);
        } else {

            $this->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5'
            ], [
                'login_id.required' => 'Se requiere el correo electrónico o el nombre de usuario',
                'login_id.exists' => 'Este nombre de usuario no está registrado',
                'password.required' => 'Se requiere la contraseña',
            ]);
        }

        $creds = array($fieldType => $this->login_id, 'password' => $this->password);

        if (!(Auth::guard('web')->attempt($creds))) {
            session()->flash('fail', 'Correo electrónico/Nombre de usuario o contraseña incorrectos');
            return;
        }

        if ($this->retunUrl != null) {
            return redirect()->to($this->retunUrl);
        }

        return redirect()->route('admin.candidates.show');
    }
}