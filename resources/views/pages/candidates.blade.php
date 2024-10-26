@extends('layouts.app')

@section('title', 'Candidates')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Nuestros candidatos</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li>Candidatos</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <!-- Breadcrumb Section End -->

    <!-- Candidates Section Begin -->
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
                                        <div class="cd-pic">
                                            <img class="rounded" src="{{ asset($candidate->ruta_can) }}"
                                                alt="{{ $candidate->car_can }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="cd-text">
                                            <div class="cd-title">
                                                <h4>
                                                    <a href="{{ route('candidate', ['id' => $candidate->id_can]) }}">
                                                        {{ $candidate->nom_can }}, {{ $candidate->ape_can }}
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
    </section>
@endsection