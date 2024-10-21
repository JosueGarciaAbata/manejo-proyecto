@extends('layouts.app')

@section('title', 'Events')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">All Events</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Events</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    
    <section class="event-one">
        <div class="container">
            <div class="row">
                @forelse ($events as $event)
                    <div class="col-lg-6">
                        <div class="event-one__single">
                            <div class="event-one__image">
                                <div class="event-one__image-inner">
                                    <!-- Se utiliza el accessor para obtener la URL de la imagen de previsualización -->
                                    <img src="{{ $event->preview_img_url }}" alt="{{ $event->tit_eve }}">
                                </div>
                            </div>
                            <div class="event-one__content">
                                <p class="event-one__date">{{ \Carbon\Carbon::parse($event->fec_eve)->format('d M, Y') }}</p>
                                <h3 class="event-one__title">
                                    <a href="#">{{ $event->tit_eve }}</a>
                                </h3>
                                <p>{{ Str::limit($event->des_eve, 100) }}</p> <!-- Muestra un resumen de la descripción -->
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Aún no existen eventos asignados.</p>
                @endforelse
            </div>

            <div class="post-pagination">
                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                <a href="#">01</a>
                <a href="#">..</a>
                <a href="#">04</a>
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
            </div><!-- /.post-pagination -->
        </div>
    </section><!-- /.event-one -->

    <section class="countdown-one thm-base-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="countdown-one__title">Our new campaign <br> starts in:</h3><!-- /.countdown-one__title -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="countdown-one__right">
                        <ul class="countdown-one__list list-unstyled">
                            <!-- content loading via js -->
                        </ul><!-- /.coundown-one__list -->
                    </div><!-- /.countdown-one__right -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.countdown-one -->

@endsection

@include('layouts.footer')
