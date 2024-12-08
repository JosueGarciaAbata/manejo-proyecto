@extends('layouts.app')

@section('title', 'Crear Candidato')

@section('content')

    <div class="container">
        <div class="inner-container thm-white-bg">
            <div class="row align-items-center">
                <h1>Registrar un nuevo candidato</h1>
            </div>
            <form action="{{ route('admin.candidates.store') }}" method="post" id="add-candidate" enctype="multipart/form-data"
                class="mailchimp-one__form add-candidate">
                @csrf
                <div class="row">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del candidato" required>
                </div>
                <div class="row">
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido del candidato" required>
                </div>
                <div class="row">
                    <input type="text" name="cargo" id="cargo" placeholder="Cargo del candidato" required>
                </div>
                <div class="row">
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" placeholder="Fecha de ingreso" required>
                </div>
                <div class="row">
                    <textarea maxlength="500" name="descripcion" id="descripcion" placeholder="Descripción del candidato" required></textarea>
                </div>
                <br>
                <div class="row">
                    <button type="submit" class="thm-btn mailchimp-one__form-btn">Registrar candidato</button>
                </div>
            </form>
        </div>
    </div>
@endsection
