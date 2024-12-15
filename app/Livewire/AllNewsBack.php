<?php

namespace App\Livewire;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;


class AllNewsBack extends Component
{
    use WithPagination;
    public $perPage = 8;
    public $search = '';
    public $orderBy = 'desc';

    protected $listeners = [
        'deleteNewAction',
    ];

    public function mount()
    {
        $this->resetPage();

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function deleteNew($id)
    {
        $this->dispatch('deleteNew', 
            title: '¿Estás seguro?',
            html: 'Quieres eliminar esta noticia.',
            id: $id,
        );
    }

    public function deleteNewAction($id)
    {
        $news = News::find($id);
        if (!$news) {
            $this->showToastr('News not found.', 'error');
            return;
        }
        $path = 'images/news_images/';
        
        $preview_image = $news->pre_img;
        $featured_image = $news->res_img;
        
        if ($preview_image && Storage::disk('public')->exists($path . $preview_image)) {
            Storage::disk('public')->delete($path . $preview_image);
        }
        
        if ($featured_image && Storage::disk('public')->exists($path . $featured_image)) {
            Storage::disk('public')->delete($path . $featured_image);
        }
        
        if ($news->delete()) {
            $this->showToastr('La noticia se elimino correctamente.', 'success');
        } else {
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
        $news = News::search(trim($this->search))
        ->when($this->orderBy, function ($query) {
            $query->orderBy('id_new', $this->orderBy);
        })
        ->paginate($this->perPage);

        return view('livewire.all-news-back', compact('news'));
    }
}
