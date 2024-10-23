@extends('layouts.app')

@section('title', 'Suggestions')

@section('content')
    <section class="form-voter-registrer">
        <form action="{{ route('voters.registerComplete') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ request('email') }}"> <!-- Guardar el correo -->
            <input type="text" name="first_name" placeholder="Nombre" required>
            <input type="text" name="last_name" placeholder="Apellido" required>
            <button type="submit">Completar Registro</button>
        </form>
    </section>
@endsection
