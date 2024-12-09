@extends('layouts.app')

@section('title', 'pages')


@section('content')
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Personaliza tu pagina</h2>
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                {{-- la parte de trabajemos juntos por una mejor UTA y el icono, aunq el ultimo podria ser para cambiar el icono d cada pagina --}}
                <li><a href="{{ route('admin.custom-page.slogan') }}">Eslogan e icon</a></li>
                {{-- vision/mission --}}
                <li><a href="{{ route('admin.custom-page.org') }}">Sobre la organización</a></li>
                {{-- <li><a href="{{ route('custom-page.events') }}">Limite de eventos a mostrar</a></li> --}}
                <li><a href="{{ route('admin.custom-page.footer') }}">Cambiar footer</a></li>
            </ul>
        </div>
    </section>

    <section class="candidates-section-admin">
        <div class="container">
            {{-- @livewire('create-candidate')
            @livewire('show-candidate') --}}
        </div>
    </section>
@endsection
