@extends('layouts.app')

@section('title', 'Events')

@section('content')

<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">{{ $event->tit_eve }}</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
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
            <div class="col-lg-4 wow fadeInLeft animated same-height" style="visibility: visible; animation-name: fadeInLeft;">
                <div class="event-details-box__single thm-base-bg">
                    <h3 class="event-details-box__title">Tags</h3>
                    <p class="event-details-box__text">Etiquetas para este evento. Descubre contenido similar.</p>
                    <ul class="sidebar__tags-list">
                        @foreach(explode(',', $event->tag_eve) as $tag)
                            <li class="sidebar__tags-list-item"><a href="{{ route('events.searchByTag', ['tag' => trim($tag)]) }}">
                                {{ trim($tag) }}
                            </a></li>
                        @endforeach
                    </ul>
                </div><!-- /.event-details-box__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8393469026173!2d-78.6260957147869!3d-1.2692740628827868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d38225e088295f%3A0xb16c26da66e6e4b3!2sUniversidad%20T%C3%A9cnica%20de%20Ambato!5e0!3m2!1ses-419!2sec!4v1729438296772!5m2!1ses-419!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 wow fadeInRight animated same-height" style="visibility: visible; animation-name: fadeInRight;">
                <div class="event-details-box__single thm-base-bg-2">
                    <h3 class="event-details-box__title">Venue</h3>
                    <p class="event-details-box__text">
                        ¡Te invitamos a formar parte de este evento único! Tu presencia marcará la diferencia. 
                    </p>                    
                    <ul class="list-unstyled event-details-box__list">
                        <!-- Fecha del evento -->
                        <li>{{ \Carbon\Carbon::parse($event->fec_ini_eve)->format('d F, Y') }}</li>
                        
                        <!-- Horario del evento -->
                        <li>{{ \Carbon\Carbon::parse($event->fec_ini_eve)->format('g:i a') }} - {{ \Carbon\Carbon::parse($event->fec_fin_eve)->format('g:i a') }}</li>
                        <li>{{ $event->dir_eve }}</li>    
                    </ul><!-- /.list-unstyled event-details-box__list -->
                </div><!-- /.event-details-box__single -->
            </div><!-- /.col-lg-4 -->
            
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

@endsection
