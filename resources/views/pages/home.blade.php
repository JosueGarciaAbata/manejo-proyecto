@extends('layouts.app')

@section('title', 'Página de Inicio')

@section('content')

    <!-- Imagen de presentacion -->

    <div class="image-container">
        <img src="{{ asset('assets/images/background/image_presentation.jpg') }}" class="image_presentation"
            alt="Descripción de la imagen">
    </div>

    <!-- Descripcion rapida-->

    <section class="thm--bg about-one">
        <div class="container">
            <div class="block-title text-center">

                <h2 class="block-title__title">Trabajemos Juntos Por Una Mejor Universidad Técnica De Ambato</h2>
                <!-- /.block-title__title -->
            </div><!-- /.block-title -->

            <div class="block-title text-center">
                <img src="{{ asset('assets/images/logo_without_background.png') }}" alt="Awesome Image" class="wow zoomIn"
                    data-wow-duration="1500ms">
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
                        <img src="{{ asset('assets/images/marycruz.jpg') }}" alt="Awesome Image" />
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
            <p class="fact-one__text">Gente que se ha unido a la campaña</p>
            <img src="assets/images/resources/decor-star-1-1.png" class="fact-one__star-2" alt="">
        </div><!-- /.container -->
    </section><!-- /.fact-one -->



    <!-- Seccion de propuestas -->

    <section class="history-one thm-gray-bg">
        <div class="container">
            <div class="block-title text-center">

                <h2 class="block-title__title">Propuestas</h2><!-- /.block-title__title -->
            </div><!-- /.block-title -->
            <div class="row">
                <div class="col-lg-12">
                    @forelse($proposals as $proposal)
                        <div class="history-one__single wow fadeInUp">

                            <div class="campaing-one__single">
                                <i class="potisen-icon-sprout"></i>
                                <h3 class="campaing-one__title"></h3>
                                <!-- /.campaing-one__title -->
                            </div><!-- /.campaing-one__single -->

                            <div class="history-one__content">
                                <h3 class="history-one__title">
                                    {{ $proposal->tit_pro }}
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

    <section class="countdown-one thm-gray-bg countdown-one__home-one" style="   padding-top: 50px;padding-bottom: 50px;">
        <div class="container">
            <div class="inner-container">
                <div class="row align-items-xl-center align-items-lg-center">
                    <div class="col-xl-6">
                        <h3 class="countdown-one__title">Las votaciones empiezan en:</h3><!-- /.countdown-one__title -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-center justify-content-sm-center">
                        <div class="countdown-one__right">
                            <ul class="countdown-one__list list-unstyled">
                                <!-- content loading via js -->
                            </ul><!-- /.coundown-one__list -->
                        </div><!-- /.countdown-one__right -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </section><!-- /.countdown-one -->
    </div><!-- /.contact-info-one -->

    <div>


        <!-- Seccion del video de presentacion-->

        <div>
            <video controls class="video_presentation ">
                <source src="{{ asset('assets/videos/video_presentation.mp4') }}" type="video/mp4">

            </video>
        </div>

    @endsection
