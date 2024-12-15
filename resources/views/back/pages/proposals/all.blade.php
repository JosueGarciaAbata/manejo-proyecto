@extends('back.layouts.pages-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Todas las propuestas')

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Propuestas
            </h2>
        </div>
    </div>
@endsection

@section('content')

    <form action="{{ route('admin.proposals.search') }}" method="get">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="query" class="form-label">Buscar</label>
                <input type="text" id="query" name="query" class="form-control"
                    placeholder="Ingresa términos de búsqueda">
            </div>
            <div class="col-md-6 mb-3">
                <label for="query" class="form-label">.</label>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    <div class="row row-cards">
        @foreach ($proposals as $proposal)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-2">
                        <h3 class="m-0 mb-1">{{ $proposal->tit_pro }}</h3>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('admin.proposals.edit-proposal', ['id_pro' => $proposal->id_pro]) }}"
                            class="card-btn">Editar</a>
                        <form action="javascript:void(0);" method="post">
                            @csrf
                            <button type="submit" class="card-btn" onclick="hideProposal({{ $proposal->id_pro }})">
                                Esconder
                            </button>
                        </form>
                        <form action="javascript:void(0);" method="post">
                            @csrf
                            <button type="submit" class="card-btn" onclick="deleteProposal({{ $proposal->id_pro }})">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    <script>
        function deleteProposal(id) {
        if (confirm('¿Estás seguro de que deseas eliminar esta propuesta?')) {
            $.ajax({
                url: "{{ route('admin.proposals.delete', ['id_pro' => '__id__']) }}".replace('__id__', id),
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: 'PUT',
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.msg); // Opcional: mostrar un mensaje
                        window.location.reload(); // Recargar la página
                    } else {
                        toastr.error(response.msg)
                    }
                },
                error: function() {
                    toastr.error(response.msg+" "+response.error)
                }
            });
        }
    }
    function hideProposal(id) {
        $.ajax({
            url: "{{ route('admin.proposals.hide', ['id_pro' => '__id__']) }}".replace('__id__', id),
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                _method: 'POST',
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.msg); // Opcional: mostrar un mensaje
                } else {
                    toastr.error(response.msg)
                }
            },
            error: function() {
                toastr.error(response.msg+" "+response.error)
            }
        });
    }
    </script>
@endpush