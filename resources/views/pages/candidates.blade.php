@extends('layouts.app')

@section('title', 'Candidates')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">All candidates</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Events</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <!-- Breadcrumb Section End -->

    <!-- Candidates Section Begin -->
    <section class="candidates-section">
        <div class="container">
            <div class="row">
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
                                            <h4>{{ $candidate->nom_can }}, {{ $candidate->ape_can }}</h4>
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
            </div>
        </div>
    </section>
@endsection
