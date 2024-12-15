<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="search" class="form-label">Buscar</label>
            <input type="text" id="search" class="form-control" placeholder="Keyword..." wire:model.live='search'>
        </div>
        
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Ordenar en</label>
            <select class="form-select" wire:model.live='orderBy'>
                <option value="desc">Desc</option>
                <option value="asc">Asc</option>
            </select>
        </div>  
    </div>

    <div class="row row-cards">
        @forelse ($news as $new)
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <img src="{{ $new->preview_img_url }}" alt="" class="card-img-top">
                <div class="card-body p-2">
                    <h3 class="m-0 mb-1">{{$new->tit_new}}</h3>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.news.edit-new',['id_new'=>$new->id_new])}}" class="card-btn">Edit</a>
                    <a href="" wire:click.prevent='deleteNew({{$new->id_new}})' class="card-btn">Delete</a>
                </div>
            </div>
        </div>
            
        @empty
         <span class="text-danger">No new(s) found</span>   
        @endforelse
    </div>
    <div class="d-block mt-2">
    {{ $news->links('livewire::simple-bootstrap') }}
</div>