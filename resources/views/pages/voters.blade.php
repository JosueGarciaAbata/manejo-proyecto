@extends('layouts.app')

@section('title', 'Voters Register')

@section('content')
    <h1 class="title-register">Completa tu registro</h1>
    <p>Tus datos personales pueden mostrarse al dar una sugerencia.</p>
    <section class="voter-register-container" >
        <form action="{{ route('voters.add-voter-data') }}" method="POST" class="voter-register-form add-suggestion">
            @csrf
            <input type="hidden" name="ema_vot" value="{{ request('email') }}">
            <input type="text" name="nom_vot" placeholder="Nombre" required>
            <input type="text" name="ape_vot" placeholder="Apellido" required>
            <button type="submit">Enviar</button>
        </form>
    </section>

@endsection
