@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Authors')
@section('content')

    <!-- Page Content -->
    @livewire('authors')

@endsection

@push('scripts')
    <script>
        $(window).on('hidden.bs.modal', function() {
            Livewire.dispatch('resetForms');
        })

        window.addEventListener('hideAddAuthorModal', function() {
            console.log('Evento hideAddAuthorModal recibido.');
            $('#add_author_modal').modal('hide');
        });

        window.addEventListener('showEditAuthorModal', function(event) {
            $('#edit_author_modal').modal('show');
        });

        window.addEventListener('hideEditAuthorModal', function(event) {
            console.log('Evento hideAddAuthorModal recibido.');
            $('#edit_author_modal').modal('hide');
        });

        window.addEventListener('deleteAuthor', function(event) {
            const detail = event.detail[0];


            Swal.fire({
                title: detail.title,
                html: detail.html,
                imageWidth: 48,
                imageHeight: 48,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteAuthorAction', {
                        id: detail.id
                    });
                }
            });
        });
    </script>
@endpush
