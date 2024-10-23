@extends('layouts.app')

@section('title', 'Voters Register')

@section('content')
    <section class="voter-register-container" >
        <form action="{{ route('voters.register') }}" method="POST" class="voter-register-form add-suggestion">
            @csrf
            <input type="hidden" name="ema_vot" value="{{ request('email') }}">
            <input type="text" name="nom_vot" placeholder="Nombre" required>
            <input type="text" name="ape_vot" placeholder="Apellido" required>
            <button type="submit">Enviar</button>
        </form>
    </section>
@endsection
