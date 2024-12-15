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
            <img src="{{ asset($candidate->ruta_can) }}" alt="Imagen del candidato">
        </div>

        <div class="candidate-content">
            <h1>Hola, soy <span>{{ $candidate->nom_can }}</span></h1>
            <h3 class="typing-text">Soy {{ $candidate->car_can }} <span></span></h3>
            <p>{{ $candidate->descrip_can }}</p>

            <div class="candidate-form">

                <!-- Validación para formación educativa -->
                <div class="candidate-form__educational">
                    <h3>Formación</h3>
                    <div class="candidate-form__educational__content">
                        @forelse ($candidate->educationalBackgrounds as $educational)
                            <p>{{ $educational->nom_edu }}</p>
                        @empty
                            <p>No se han encontrado registros de formación educativa.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Validación para experiencia profesional -->
                <div class="candidate-form__professional">
                    <h3>Experiencia</h3>
                    <div class="candidate-form__professional__content">
                        @forelse ($candidate->professionalExperiences as $experience)
                            <p>{{ $experience->nom_exp }}</p>
                        @empty
                            <p>No se han encontrado registros de experiencia profesional.</p>
                        @endforelse
                    </div>
                </div>

            </div> <!-- .candidate-form -->

            <!-- Validación para redes sociales -->
            <div class="social-icons">
                <h3>Redes sociales</h3>
                <div class="social-icons__content">
                    @forelse ($candidate->socialLinks as $socialLink)
                        <a href="{{ $socialLink->url_soc }}" target="_blank">
                            <img src="{{ asset($socialLink->icon->path_icon) }}" alt="{{ $socialLink->platform_soc }}">
                        </a>
                    @empty
                        <p>No se han encontrado redes sociales asociadas.</p>
                    @endforelse
                </div>
            </div>

        </div> <!-- .candidate-content -->
    </section>
@endsection
