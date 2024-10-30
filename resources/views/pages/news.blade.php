@extends('layouts.app')

@section('title', 'News')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Noticias</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('news') }}">News</a></li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="mailchimp-one">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <h3 class="mailchimp-one__title">Personaliza tú busqueda:</h3><!-- /.mailchimp-one__title -->
                </div><!-- /.col-lg-5 -->
                <div class="col-lg-10">
                    <form method="GET" action="{{ route('news.search') }}" class="mailchimp-one__form row" novalidate="true">
                        <div class="form-group col-md-4">
                            <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="query" name="query" class="form-control" placeholder="Buscar por título, tag..." value="{{ request('query') }}">
                        </div>
                        
                        <button type="submit" class="thm-btn mailchimp-one__form-btn">Aplicar</button>
                        
                    </form>
                </div><!-- /.col-lg-7 -->
            </div>
        </div><!-- /.container -->
    </section>
    
    <section class="blog-one">
        <div class="container">
            @if(request()->has('tag'))
            @php
                $tags = explode(',', request('tag'));
            @endphp
        
            <div class="row align-items-center" style="padding: 20px 0;">
                <div class="col-lg-3">
                    <p class="block-title__tag-line">Tags Seleccionados:</p>
                </div><!-- /.col-lg-3 -->
                <div class="col-lg-8">
                    <ul class="sidebar__tags-list" style="padding-left: 0px;">
                        @foreach($tags as $tag)
                            <li class="sidebar__tags-list-item" style="display: inline-block; margin-right: 10px;">
                                <a href="{{ route('events.searchByTag', ['tag' => trim($tag)]) }}">
                                    {{ trim($tag) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>                                                               
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
            @endif

            <div class="row">
                @forelse($news as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <img src="{{ $item->preview_img_url }}" alt="Preview Image">
                                <a class="blog-one__more-link" href="{{ route('news.show', $item->id_new) }}">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div><!-- /.blog-one__image -->
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="#">{{ $item->formatted_fec_pub_new }}</a></li>
                                </ul>
                                <h3 class="blog-one__title">
                                    <a href="{{ route('news.show', $item->id_new) }}">{{ $item->tit_new }}</a>
                                </h3>
                                <a href="{{ route('news.show', $item->id_new) }}" class="blog-one__link">Read More</a>
                            </div><!-- /.blog-one__content -->
                        </div><!-- /.blog-one__single -->
                    </div><!-- /.col-lg-4 -->
                @empty
                    <p>No hay noticias disponibles.</p>
                @endforelse
            </div><!-- /.row -->

            @php
                $currentPage = $news->currentPage();
                $lastPage = $news->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            <div class="post-pagination">
                {{-- Botón para la página anterior (<<) --}}
                @if ($news->onFirstPage())
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-left"></i></a>
                @else
                    <a href="{{ $news->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                @endif

                {{-- Enlace para la primera página --}}
                @if ($currentPage > 3)
                    <a href="{{ $news->url(1) }}">01</a>
                    @if ($currentPage > 4)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                @endif

                {{-- Enlaces de las páginas cercanas --}}
                @foreach (range($startPage, $endPage) as $page)
                    @if ($page == $currentPage)
                        <a href="{{ $news->url($page) }}" class="active">{{ sprintf('%02d', $page) }}</a>
                    @else
                        <a href="{{ $news->url($page) }}">{{ sprintf('%02d', $page) }}</a>
                    @endif
                @endforeach

                {{-- Enlace para la última página --}}
                @if ($currentPage < $lastPage - 2)
                    @if ($currentPage < $lastPage - 3)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                    <a href="{{ $news->url($lastPage) }}">{{ sprintf('%02d', $lastPage) }}</a>
                @endif

                {{-- Botón para la página siguiente (>>) --}}
                @if ($news->hasMorePages())
                    <a href="{{ $news->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                @else
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-right"></i></a>
                @endif
            </div><!-- /.post-pagination -->
        </div><!-- /.container -->
    </section>

@endsection
