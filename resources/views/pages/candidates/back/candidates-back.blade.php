@extends('layouts.app')

@section('title', 'Candidates')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Añadir candidatos</h2>
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li>Candidatos</li>
            </ul>
        </div>
    </section>

    <section class="add-candidate-btn">
        <div class="container-admin">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal">
                Añadir Candidato
            </button>
        </div>
    </section>

    <!-- Modal para añadir candidato -->
    <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testModalLabel">Prueba de Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">El modal funciona!</div>
            </div>
        </div>
    </div>

    <section class="candidates-section">
        <div class="container">
            <div class="row">
                @forelse ($candidates as $candidate)
                    @include('pages.candidates.candidate-item', ['candidate' => $candidate])
                @empty
                    <div class="col-12">
                        <p class="text-center">No hay candidatos por el momento.</p>
                    </div>
                @endforelse
            </div>
            {{ $candidates->links() }}
        </div>
    </section>
@endsection
