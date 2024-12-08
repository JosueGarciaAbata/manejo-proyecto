<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Authors extends Component
{
    use WithPagination;

    public $name, $email, $username, $author_type;
    public $search;
    public $perPage = 4;
    public $selected_author_id;
    public $blocked = 0;

    protected $listeners = [
        'resetForms',
        'deleteAuthorAction'
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetForms()
    {
        $this->name = $this->email = $this->username = $this->author_type = null;
        $this->resetErrorBag();
    }

    public function addAuthor()
    {
        $this->validateAuthor();

        if (!$this->isOnline()) {
            $this->showToastr('error', 'Estás desconectado, revisa tu conexión e intenta nuevamente más tarde.');
            return;
        }

        $default_password = Random::generate(8);
        $author = $this->createUser($default_password);

        if ($author) {
            $this->showToastr('success', 'Nuevo usuario ha sido agregado.👌');
            $this->clearFormFields();
            $this->dispatch('hideAddAuthorModal'); // Utilizar dispatch
        } else {
            $this->showToastr('error', '¡Algo salió mal! 😨');
        }
    }

    protected function validateAuthor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:6|max:20',
            'author_type' => 'required|exists:types,id',
        ], [
            'author_type.required' => 'Elige el tipo de usuario.',
            'author_type.exists' => 'El tipo de autor seleccionado no es válido.',
        ]);
    }

    protected function createUser($default_password)
    {
        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($default_password),
            'type' => $this->author_type,
        ]);
    }

    protected function clearFormFields()
    {
        $this->name = $this->email = $this->username = $this->author_type = null;
    }

    // Método para editar un autor  
    public function editAuthor($authorData)
    {
        $author = User::find($authorData['id']);

        if ($author) {
            $this->selected_author_id = $author->id;
            $this->name = $author->name;
            $this->email = $author->email;
            $this->username = $author->username;
            $this->author_type = $author->type;

            $this->dispatch('showEditAuthorModal');
        }
    }

    // Método para actualizar el autor
    public function updateAuthor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selected_author_id,
            'username' => 'required|min:6|max:20|unique:users,username,' . $this->selected_author_id,
        ]);

        if ($this->selected_author_id) {
            $author = User::find($this->selected_author_id);
            if ($author) {
                $author->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'username' => $this->username,
                    'type' => $this->author_type,
                ]);

                $this->showToastr('success', 'Los detalles del usuario se han actualizado correctamente. ✨');
                $this->dispatch('hideEditAuthorModal'); // Utilizar dispatch
            }
        }
    }

    // Método para eliminar un autor
    public function deleteAuthor($author)
    {
        $this->dispatch('deleteAuthor', [
            'title' => '¿Estás seguro de eliminar?',
            'html' => 'Deseas eliminar este autor: <br><b>' . $author['name'] . '</b>',
            'id' => $author['id'],
        ]);
    }

    // Acción de eliminación del autor
    public function deleteAuthorAction($id)
    {
        $author = User::find($id);  // Buscas el autor por el id recibido

        if ($author) {
            // Si el autor existe, lo eliminas
            $author->delete();
            $this->showToastr('info', 'Autor eliminado correctamente. ✅');
        } else {
            // Si no se encuentra el autor, mostramos un mensaje de error
            $this->showToastr('error', 'Error al eliminar el autor. ❌');
        }
    }

    public function showToastr($type, $message)
    {
        $this->dispatch('showToastr', ['type' => $type, 'message' => $message]);
    }

    // Método para verificar si estás en línea (sin cambios)
    protected function isOnline($url = 'https://www.google.com')
    {
        $headers = @file_get_contents($url);
        return $headers ? true : false;
    }

    public function render()
    {
        $authors = User::search(trim($this->search))
            ->where('id', '!=', auth()->id())
            ->paginate($this->perPage);

        return view('livewire.authors', [
            'authors' => $authors,
        ]);
    }
}