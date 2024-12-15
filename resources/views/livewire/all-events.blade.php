<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="search" class="form-label">Buscar</label>
            <input type="text" id="search" class="form-control" placeholder="Keyword..." wire:model.live='search'>
        </div>
        
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Ordenar en</label>
            <select class="form-select" wire:model.live='orderBy'>
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>
        </div>  
    </div>

    <div class="row row-cards">
        @forelse ($events as $event)
        <div class="col-md-4 col-lg-2">
            <div class="card">
                <img src="{{ $event->preview_img_url }}" alt="" class="card-img-top">
                <div class="card-body p-2">
                    <h3 class="m-0 mb-1">{{$event->tit_eve}}</h3>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.events.edit-event',['id_eve'=>$event->id_eve])}}" class="card-btn">Edit</a>
                    <a href="" wire:click.prevent='deleteEvent({{$event->id_eve}})' class="card-btn">Delete</a>
                </div>
            </div>
        </div>
            
        @empty
         <span class="text-danger">No event(s) found</span>   
        @endforelse
    </div>
    <div class="d-block mt-2">
    {{ $events->links('livewire::simple-bootstrap') }}
</div>
