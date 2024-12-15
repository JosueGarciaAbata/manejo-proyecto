@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Todos las Noticias')

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Todos las Noticias
      </h2>
    </div>
</div>
@endsection

@section('content')
    @livewire('all-news-back')
@endsection

@push('scripts')
  <script>
    window.addEventListener('deleteNew',function(event){
         swal.fire({
           title:event.detail.title,
           imageWidth:48,
           imageHeight:48,
           html:event.detail.html,
           showCloseButton:true,
           showCancelButton:true,
           cancelButtonText:'Cancelar',
           confirmButtonText:'Si, eliminar',
           cancelButtonColor:'#d33',
           confirmButtonColor:'#3085d6',
           width:300,
           allowOutsideClick:false
         }).then(function(result){
              if (result.value){
                Livewire.dispatch('deleteNewAction', { id: event.detail.id });
              }
         });
    });
  </script>
    
@endpush