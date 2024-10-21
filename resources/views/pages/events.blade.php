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
            
            @php
                $currentPage = $events->currentPage();
                $lastPage = $events->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            <div class="post-pagination">
                {{-- Botón para la página anterior (<<) --}}
                @if ($events->onFirstPage())
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-left"></i></a>
                @else
                    <a href="{{ $events->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                @endif

                {{-- Enlace para la primera página --}}
                @if ($currentPage > 3)
                    <a href="{{ $events->url(1) }}">01</a>
                    @if ($currentPage > 4)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                @endif

                {{-- Enlaces de las páginas cercanas --}}
                @foreach (range($startPage, $endPage) as $page)
                    @if ($page == $currentPage)
                        <a href="{{ $events->url($page) }}" class="active">{{ sprintf('%02d', $page) }}</a>
                    @else
                        <a href="{{ $events->url($page) }}">{{ sprintf('%02d', $page) }}</a>
                    @endif
                @endforeach

                {{-- Enlace para la última página --}}
                @if ($currentPage < $lastPage - 2)
                    @if ($currentPage < $lastPage - 3)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                    <a href="{{ $events->url($lastPage) }}">{{ sprintf('%02d', $lastPage) }}</a>
                @endif

                {{-- Botón para la página siguiente (>>) --}}
                @if ($events->hasMorePages())
                    <a href="{{ $events->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                @else
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-right"></i></a>
                @endif
            </div>

            <!-- /.post-pagination -->
        </div>
    </section><!-- /.event-one -->



@endsection

