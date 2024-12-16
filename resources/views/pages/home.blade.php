@extends('layouts.app')

@section('title', 'Página de Inicio')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')

    <!-- Imagen de presentacion -->

   <div class="image-container">
        @if ($organizationConfig->representant)
            <img src="{{ asset('storage/' . $organizationConfig->representant) }}" class="image_presentation"
                alt="Descripción de la imagen">
        @else
            <img src="{{ asset('assets/images/background/image_presentation.jpg') }}" class="image_presentation"
                alt="Descripción de la imagen">
        @endif
    </div>

    <section class="thm--bg about-one">
        <div class="container">
            <div class="block-title text-center">

                <h2 class="block-title__title">
                    {{ $organizationConfig->slogan ?? 'Trabajemos Juntos Por Una Mejor Universidad Técnica De Ambato' }}
                </h2>
                <!-- /.block-title__title -->
            </div><!-- /.block-title -->

            <div class="block-title text-center">
                @if ($organizationConfig->icon)
                    <img src="{{ asset('storage/' . $organizationConfig->icon) }}" class="wow zoomIn"
                        data-wow-duration="1500ms">
                @else
                    <img src="{{ asset('assets/images/logo_without_background.png') }}" class="wow zoomIn"
                        data-wow-duration="1500ms">
                @endif
            </div>
            <!-- /.about-one__text -->
        </div><!-- /.container -->
    </section><!-- /.thm-gray-bg about-one -->


    <!-- Seccion de mision y vision -->

    <section class="about-three thm-gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-three__image">
                        @if ($imgMainPoliticalParty)
                            <img src="{{ asset($imgMainPoliticalParty) }}">
                        @else
                            <img src="{{ asset('image/candidates/Mary.jpg') }}" />
                        @endif
                    </div><!-- /.about-three__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-three__content">
                        <div class="block-title text-left">

                            <h2 class="block-title__title">Misión y Visión</h2><!-- /.block-title__title -->
                        </div><!-- /.block-title -->
                        <div class="about-three__box-wrap">
                            <div class="about-three__box">
                                <i class="potisen-icon-bid"></i>
                                <h4 class="about-three__box-title">Excelencia Académica
                                    <!-- /.about-three__box-title -->
                            </div><!-- /.about-three__box -->
                            <div class="about-three__box">
                                <i class="potisen-icon-work"></i>
                                <h4 class="about-three__box-title">Formación Integral
                                    <!-- /.about-three__box-title -->
                            </div><!-- /.about-three__box -->
                            <div class="about-three__box">
                                <i class="potisen-icon-politics"></i>
                                <h4 class="about-three__box-title">Compromiso <br> Social y Ético</h4>
                                <!-- /.about-three__box-title -->
                            </div><!-- /.about-three__box -->
                        </div>
                        <p class="about-three__text">{{ $missionVision }}</p><!-- /.about-three__text -->

                    </div><!-- /.about-three__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.about-three -->

    <!-- Seccion de apoyo del publico -->

    <section class="fact-one ">
        <div class="container text-center">
            <img src="assets/images/resources/decor-star-1-1.png" class="fact-one__star-1" alt="">
            <h3 class="fact-one__title counter" style="color:#0C1B3C">{{ $voteCount }}</h3>
            <p class="fact-one__text">Personas que apoyan la candidatura</p>
            <img src="assets/images/resources/decor-star-1-1.png" class="fact-one__star-2" alt="">
        </div><!-- /.container -->
    </section><!-- /.fact-one -->



    <!-- Seccion de propuestas -->

    <section class="history-one thm-gray-bg">
        <div class="container">
            <div class="block-title text-center">

                <h2 class="block-title__title">Principales Propuestas</h2><!-- /.block-title__title -->
            </div><!-- /.block-title -->
            <div class="row">
                <div class="col-lg-12">
                    @forelse($proposals as $proposal)
                        <div class="history-one__single wow fadeInUp">

                            <div class="campaing-one__single">
                                <i class="potisen-icon-mortarboard"></i>
                                <h3 class="campaing-one__title"></h3>
                                <!-- /.campaing-one__title -->
                            </div><!-- /.campaing-one__single -->

                            <div class="history-one__content">
                                <h3 class="history-one__title">
                                    <a href="{{ url('/proposal/' . $proposal->id_pro) }}">{{ $proposal->tit_pro }}</a>
                                </h3>
                                <p class="history-one__text">
                                    {{ $proposal->des_pro }}

                                </p>
                            </div><!-- /.history-one__content -->
                        </div><!-- /.history-one__single -->


                    @empty
                        <p>No se encontraron las propuestas.</p>
                    @endforelse


                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.history-one -->


    <!-- Seccion de eventos -->

    <section class="event-one event-one__home-one">
        <div class="container">
            <div class="block-title text-center">
                <h2 class="block-title__title">Proximos Eventos</h2>
            </div>
            <div class="row">
                @forelse($events as $event)
                    <div class="col-xl-4">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__image-inner">
                                    <img src="{{ $event->preview_img_url }}" alt="{{ $event->tit_eve }}">
                                </div>
                            </div>
                            <div class="event-one__content">
                                <p class="event-one__date">{{ $event->formatted_start_date }}</p>
                                <h3 class="event-one__title"> <a
                                        href="{{ url('/event/' . $event->id_eve) }}">{{ $event->tit_eve }}</a></h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No upcoming events found.</p>
                @endforelse
            </div>
        </div>
    </section>

    </div><!-- /.contact-info-one -->

    <div>




    @endsection
