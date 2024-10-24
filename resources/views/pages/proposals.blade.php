@extends('layouts.app')

@section('title', 'Proposals')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Propuestas</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('proposals') }}">Proposals</a></li>
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
                    <form method="GET" action="{{ route('proposals.search') }}" class="mailchimp-one__form row" novalidate="true">
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
    
    <section class="proposal-one">
        <div class="block-title text-center">
            <p class="block-title__tag-line">Descubre nuevos Propuestas</p>
            <h2 class="block-title__title">Esperamos contar contigo!</h2><!-- /.block-title__title -->
        </div>
        
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
                    <ul class="sidebar__tags-list" style="padding-left: 15px;">
                        @foreach($tags as $tag)
                            <li class="sidebar__tags-list-item" style="display: inline-block; margin-right: 10px;">
                                <a href="{{ route('proposals.searchByTag', ['tag' => trim($tag)]) }}">
                                    {{ trim($tag) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>                                                               
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        @endif
        

            <div class="row">
                @forelse ($proposals as $proposal)
                <div class="col-lg-6">
                    <div class="proposal-one__single">
                        <div class="proposal-one__image">
                            <div class="proposal-one__image-inner">
                                <a href="{{ route('proposal.show', ['id' => $proposal->id_pro]) }}">
                                    <img src="{{ asset('assets/images/resources/' . $proposal->img_pro) }}" alt="{{ $proposal->tit_pro }}">
                                </a>
                            </div>
                        </div>
                        <div class="proposal-one__content">
                            <p class="proposal-one__date">
                                {{ \Carbon\Carbon::parse($proposal->fec_ini_pro)->format('d M, Y') }}
                            </p>
            
                            <h3 class="proposal-one__title">
                                <a href="{{ route('proposal.show', ['id' => $proposal->id_pro]) }}">
                                    {{ $proposal->tit_pro }}
                                </a>
                            </h3>
            
                            <!-- Dirección del proposalo -->
                            <ul class="sidebar__tags-list">
                                @foreach(explode(',', $proposal->tag_pro) as $index => $tag)
                                    @if($index < 3) <!-- Limitar a 3 tags -->
                                        <li class="sidebar__tags-list-item">
                                            <a href="{{ route('proposals.searchByTag', ['tag' => trim($tag)]) }}">
                                                {{ trim($tag) }}
                                            </a>
                                        </li>
                                    @else
                                        @break
                                    @endif
                                @endforeach                            
                                <!--        
                                @if(count(explode(',', $proposal->tag_pro)) > 3)
                                    <li class="sidebar__tags-list-item">
                                        <a href="#" onclick="showAllTags(proposal)">Ver más...</a>
                                    </li>
                                @endif
                                -->
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay Propuestas que coincidan con la búsqueda.</p>
            @endforelse
            
            </div>            
            
            @php
                $currentPage = $proposals->currentPage();
                $lastPage = $proposals->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            <div class="post-pagination">
                {{-- Botón para la página anterior (<<) --}}
                @if ($proposals->onFirstPage())
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-left"></i></a>
                @else
                    <a href="{{ $proposals->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                @endif

                {{-- Enlace para la primera página --}}
                @if ($currentPage > 3)
                    <a href="{{ $proposals->url(1) }}">01</a>
                    @if ($currentPage > 4)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                @endif

                {{-- Enlaces de las páginas cercanas --}}
                @foreach (range($startPage, $endPage) as $page)
                    @if ($page == $currentPage)
                        <a href="{{ $proposals->url($page) }}" class="active">{{ sprintf('%02d', $page) }}</a>
                    @else
                        <a href="{{ $proposals->url($page) }}">{{ sprintf('%02d', $page) }}</a>
                    @endif
                @endforeach

                {{-- Enlace para la última página --}}
                @if ($currentPage < $lastPage - 2)
                    @if ($currentPage < $lastPage - 3)
                        <a class="disabled" aria-disabled="true">...</a>
                    @endif
                    <a href="{{ $proposals->url($lastPage) }}">{{ sprintf('%02d', $lastPage) }}</a>
                @endif

                {{-- Botón para la página siguiente (>>) --}}
                @if ($proposals->hasMorePages())
                    <a href="{{ $proposals->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                @else
                    <a class="disabled" aria-disabled="true"><i class="fa fa-angle-double-right"></i></a>
                @endif
            </div>

            <!-- /.post-pagination -->
        </div>
    </section><!-- /.proposal-one -->


@endsection