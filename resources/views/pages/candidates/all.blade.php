@extends('layouts.app')

@section('title', 'Candidates')


@section('content')
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Candidatos</h2>
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li>Candidatos</li>
            </ul>
        </div>
    </section>

    <section class="candidates-section">
        <div class="container">

            <!-- Botón para agregar un nuevo candidato -->
            <div class="row mb-3">
                <div class="col-12 text-end">
                    <a href="{{ route('admin.candidates.store') }}" class="btn btn-primary">
                        Agregar Nuevo Candidato
                    </a>
                </div>
            </div>

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
