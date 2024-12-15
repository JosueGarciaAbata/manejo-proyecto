<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AllEvents extends Component
{
    use WithPagination;
    public $perPage = 12;
    public $search = '';
    public $orderBy = 'asc';

    protected $listeners = [
        'deleteEventAction',
    ];

    public function mount()
    {
        $this->resetPage();

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function deleteEvent($id)
    {
        $this->dispatch('deleteEvent', 
            title: '¿Estás seguro?',
            html: 'Quieres eliminar este evento.',
            id: $id,
        );
    }

    public function deleteEventAction($id)
    {
        $event = Event::find($id);
        $path = 'images/event_images/';
        $preview_image = $event->pre_img;
        $featured_image = $event->res_img;

        if ($featured_image != null && Storage::disk('public')->exists($path . $featured_image)) {
            if (Storage::disk('public')->exists($path . $preview_image)) {
                Storage::disk('public')->delete($path . $featured_image);
            }

            if (Storage::disk('public')->exists($path . $preview_image)) {
                Storage::disk('public')->delete($path . $featured_image);
            }

            Storage::disk('public')->delete($path . $featured_image);
        }

        $delete_event = $event->delete();

        if ($delete_event) {
            //return response()->json(['code' => 1, 'msg' => 'Evento borrado exitosamente.']);
            $this->showToastr('Event has been successfully deleted.', 'success');
        } else {
            //return response()->json(['code' => 3, 'msg' => 'Algo salio mal.']);
            $this->showToastr('Something went wrong.', 'error');
        }
    }

    public function showToastr($message, $type)
    {
        return $this->dispatch('showToastr', 
            type: $type,
            message: $message,
        );
    }

    public function render()
    {
        $events = Event::search(trim($this->search))
            ->when($this->orderBy, function ($query) {
                $query->orderBy('id_eve', $this->orderBy);
            })
            ->paginate($this->perPage);
    
        return view('livewire.all-events', compact('events'));
    }    
}
