@extends('layouts.app')

@section('title', 'Proposal')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">{{ $proposal->tit_pro }}</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('proposals') }}">Proposal</a></li>
                <li>{{ $proposal->tit_pro }}</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->


    <!--No hace falta un nuevo estilo para las propuestas-->
    <section class="event-details">
        <div class="container">
            @if ($proposal->img_pro != null)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="event-details__content">
                            <h3 class="event-details__title">{{ $proposal->tit_pro }}</h3>
                            <p class="event-details__text">{{ $proposal->des_pro }}</p>
                        </div><!-- /.proposal-details__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="event-details__image wow fadeInRight animated"
                            style="visibility: visible; animation-name: fadeInRight;">
                            <img src="{{ asset('assets/images/resources/' . $proposal->img_pro) }}" alt="proposal image"
                                class="img-fluid">
                        </div><!-- /.proposal-details__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            @else
                <div class="row">
                    <div class="event-details__content">
                        <h3 class="event-details__title">{{ $proposal->tit_pro }}</h3>
                        <p class="event-details__text">{{ $proposal->des_pro }}</p>
                    </div>
                </div>
            @endif
        </div><!-- /.container -->
    </section>

    <section class="event-details-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft animated same-height"
                    style="visibility: visible; animation-name: fadeInLeft;">
                    <div class="event-details-box__single thm-base-bg">
                        <h3 class="event-details-box__title">Tags</h3>
                        <p class="event-details-box__text">Descubre contenido similar.
                        </p>
                        <ul class="sidebar__tags-list">
                            @foreach (explode(',', $proposal->tags_pro) as $tag)
                                <li class="sidebar__tags-list-item"><a
                                        href="{{ route('proposals.searchByTag', ['tag' => trim($tag)]) }}">
                                        {{ trim($tag) }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div><!-- /.proposal-details-box__single -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 wow fadeInRight animated same-height"
                    style="visibility: visible; animation-name: fadeInRight;">
                    <div class="event-details-box__single thm-base-bg-2">
                        <h3 class="event-details-box__title">Venue</h3>
                        <p class="event-details-box__text">
                            ¡Apoya esta propuesta y contribuye con la universidad!
                        </p>
                        <ul class="list-unstyled event-details-box__list">
                            <!-- Fecha del evento -->
                            <li>{{ \Carbon\Carbon::parse($proposal->fec_ini_pro)->format('d F, Y') }}</li>
                    </div><!-- /.proposal-details-box__single -->
                </div><!-- /.col-lg-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
