@extends('layouts.app')

@section('title', 'Candidates')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Candidato: {{ $candidate->nom_can }}</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('candidates') }}">Candidatos</a></li>
                <li>Candidato</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="candidate">

        <div class="candidate-img">
            <img src="{{ asset($candidate->ruta_can) }}" alt="">
        </div>

        <div class="candidate-content">
            <h1>Hola, soy <span>{{ $candidate->nom_can }}</span></h1>
            <h3 class="typing-text">Soy {{ $candidate->car_can }} <span></span></h3>
            <p>{{ $candidate->descrip_can }}</p>

            <div class="candidate-form">

                <div class="candidate-form__educational">
                    <h3>Formacion</h3>
                    <div class="candidate-form__educational__content">
                        @foreach ($candidate->educationalBackgrounds as $educational)
                            <p>{{ $educational->nom_edu }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="candidate-form__professional">
                    <h3>Experiencia</h3>
                    <div class="candidate-form__professional__content">
                        @foreach ($candidate->professionalExperiences as $experience)
                            <p>{{ $experience->nom_exp }}</p>
                        @endforeach
                    </div>
                </div>

            </div> <!-- .candidate-form -->

            <div class="social-icons">
                <h3>Redes sociales</h3>
                <div class="social-icons__content">
                    @foreach ($candidate->socialLinks as $socialLink)
                        <a href="{{ $socialLink->url_soc }}">
                            <img src="{{ asset($socialLink->icon->path_icon) }}" alt="{{ $socialLink->platform_soc }}">
                        </a>
                    @endforeach
                </div>
            </div>

        </div> <!-- .candidate-content -->
    </section>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="close-btn" onclick="closeModal()">&times;</div>
            <div id="modal-body">

            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('assets/js/candidate.js') }}"></script> --}}
@endsection
