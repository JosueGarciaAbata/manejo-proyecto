@extends('layouts.app')

@section('title', 'Events')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Eventos</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Events</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <div class="cta-three__bottom">
        <div class="container">
            <div class="inner-container thm-base-bg-2 text-center wow fadeInUp animated" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                <img src="assets/images/resources/decor-star-1-2.png" class="cta-three__bottom-star-1" alt="Awesome Image">
                <h3 class="cta-three__bottom-title">Siempre promoviendo tu bienestar</h3><!-- /.cta-three__bottom-title -->
                <img src="assets/images/resources/decor-star-1-2.png" class="cta-three__bottom-star-2" alt="Awesome Image">
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </div>
    <section class="event-one">


        <div class="block-title text-center">
            <p class="block-title__tag-line">Descubre nuevos eventos</p>
            <h2 class="block-title__title">Esperamos contar contigo!</h2><!-- /.block-title__title -->
        </div>
        

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
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Aún no existen eventos asignados.</p>
                @endforelse
            </div>

            <div class="post-pagination">
                {{ $events->links() }}
            </div><!-- /.post-pagination -->
        </div>
    </section><!-- /.event-one -->



@endsection

