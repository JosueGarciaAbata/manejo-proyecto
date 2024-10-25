@extends('layouts.app')

@section('title', 'Candidates')

@section('content')

    <section class="candidate">
        <div class="candidate-img">
            <img src="{{ asset($candidate->ruta_can) }}" alt="">
        </div>
        <div class="candidate-content">
            <h1>Hola, soy <span>{{ $candidate->nom_can }}</span></h1>
            <h3 class="typing-text">Soy {{ $candidate->car_can }} <span></span></h3>
            <p>{{ $candidate->descrip_can }}</p>
            {{-- <div class="social-icons">
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div> --}}
            {{-- <a href="#" class="btn">Hire me</a> --}}
        </div>
    </section>

@endsection
