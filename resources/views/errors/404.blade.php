@extends('layouts.app')

@section('title', 'Página de Inicio')

@section('content')
    <h1>404 - Página no encontrada</h1>
    <p>Lo sentimos, la página que estás buscando no existe.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver al Inicio</a>
@endsection