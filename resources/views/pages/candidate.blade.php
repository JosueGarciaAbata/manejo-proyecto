@extends('layouts.app')

@section('title', 'Candidates')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Candidato {{ $candidate->nom_can }}</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('candidatos') }}">Candidatos</a></li>
                <li>Candidato</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="candidate">
        <div class="candidate-img">
            <img src="{{ asset($candidate->ruta_can) }}" alt="">
        </div> <!-- .candidate -->
        <div class="candidate-content">
            <h1>Hola, soy <span>{{ $candidate->nom_can }}</span></h1>
            <h3 class="typing-text">Soy {{ $candidate->car_can }} <span></span></h3>
            <p>{{ $candidate->descrip_can }}</p>

            <div class="social-icons">
                @foreach ($candidate->socialLinks as $socialLink)
                    <a href="{{ $socialLink->url_soc }}">
                        <img src="{{ asset($socialLink->icon->path_icon) }}" alt="{{ $socialLink->platform_soc }}">
                    </a>
                @endforeach
            </div>
        </div> <!-- .candidate-content -->
    </section>
@endsection
