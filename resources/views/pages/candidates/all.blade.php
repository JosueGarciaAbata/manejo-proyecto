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
            @livewire('create-candidate')
            @livewire('show-candidate')
        </div>
    </section>
@endsection
