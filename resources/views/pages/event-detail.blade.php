@extends('layouts.app')

@section('title', 'Events')

@section('content')

        <section class="inner-banner">
            <div class="container">
                <h2 class="inner-banner__title">{{ $event->tit_eve }}</h2><!-- /.inner-banner__title -->
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $event->tit_eve }}</li>
                </ul><!-- /.list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.inner-banner -->

        <section class="event-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="event-details__content">
                            <h3 class="event-details__title">{{ $event->tit_eve }}</h3>
                            <p class="event-details__text">{{ $event->des_eve }}</p>
                        </div><!-- /.event-details__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="event-details__image wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                            <img src="{{ $event->resource_img_url }}" alt="Event image" class="img-fluid">
                        </div><!-- /.event-details__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <section class="event-details-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="event-details-box__single thm-base-bg">
                            <h3 class="event-details-box__title">Venue</h3>
                            <p class="event-details-box__text">{{ $event->tag_eve }}</p>
                            <ul class="list-unstyled event-details-box__list">
                                <li>{{ $event->fec_eve }}</li>
                                <li>9:00am - 2:00pm</li> <!-- Puedes ajustar según el modelo -->
                                <li>New York</li> <!-- Reemplaza si tienes datos de ubicación -->
                            </ul><!-- /.list-unstyled event-details-box__list -->
                        </div><!-- /.event-details-box__single -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-8 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <iframe src="https://www.google.com/maps/embed?..."></iframe> <!-- Aquí puedes hacer dinámico el iframe si tienes las coordenadas del evento -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

@endsection
