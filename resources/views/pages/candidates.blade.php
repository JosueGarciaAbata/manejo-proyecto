@extends('layouts.app')

@section('title', 'Candidates')


@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div clasS="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Conoce nuestros candidatos</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Nuestros candidatos</h2>
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li>Candidatos</li>
            </ul>
        </div>
    </section>

    <section class="candidates-section">
        <div class="container">
            <div class="row">
                @if ($candidates->isEmpty())
                    <div class="col-12">
                        <p class="text-center">No hay candidatos por el momento.</p>
                    </div>
                @else
                    @foreach ($candidates as $candidate)
                        <div class="col-sm-6">
                            <div class="candidate-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="cd-pic" id="{{ $candidate->id_can }}">
                                            <img src="{{ asset($candidate->ruta_can) }}" alt="{{ $candidate->car_can }}">
                                            <div class="overlay">
                                                Votar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="cd-text">
                                            <div class="cd-title">
                                                <h4>
                                                    <a href="{{ route('candidate', ['id' => $candidate->id_can]) }}">
                                                        {{ $candidate->nom_can }} {{ $candidate->ape_can }}
                                                    </a>
                                                </h4>
                                                <span>{{ $candidate->car_can }}</span>
                                                <span>{{ $candidate->tit_can }}</span>
                                                <span>{{ $candidate->fec_ing_can }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        </div>
        </div>
    </section>
    <section id="container-add-vote" class="modal">
        <article class="contenido-modal">
            <span class="cerrar">&times;</span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Tu voto es importante</h2>
                            <p>Elige con responsabilidad, integridad y honestidad</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <form action="{{ route('vote.store') }}" method="POST" class="mailchimp-one__form add-vote">
                            @csrf
                            <input type="hidden" name='id_can' id="id_can" value="">
                            <input type="text" name='ema_vot' placeholder="Email">
                            <button type="submit" class="thm-btn mailchimp-one__form-btn">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>

        </article>
    </section>
    <script src="{{ asset('assets/js/candidates.js') }}"></script>
@endsection
