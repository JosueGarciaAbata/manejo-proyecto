@extends('layouts.app')

@section('title', 'News Details')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Detalle de Noticia</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('news') }}">News</a></li>
                <li>Detalle Noticia</a></li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="blog-details">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="blog-one__single">
                        <div class="blog-one__image">
                            <img src="{{ $newsItem->resource_img_url }}" alt="">
                        </div>
                        <div class="blog-one__content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="#">{{ $newsItem->formatted_fec_pub_new }}</a></li>
                            </ul>
                            <h3 class="blog-one__title">{{ $newsItem->tit_new }}</h3>
                            @foreach ($newsItem->paragraphs as $paragraph)
                                <p class="blog-one__text">{!! trim($paragraph) !!}</p>
                            @endforeach
                            <div class="share-block">
                                <div class="left-block">
                                    <p>Tags: 
                                        @foreach ($newsItem->tags_array as $tag)
                                            <a href="{{ route('news.searchByTag', ['tag' => trim($tag)]) }}">{{ trim($tag) }}</a>
                                        @endforeach
                                    </p>                                    
                                </div>
                                <div class="social-block">
                                    <a href="https://www.facebook.com/profile.php?id=61565950187878" class="fa fa-facebook-square"></a>
                                    <a href="https://www.instagram.com/marycruzlascano/" class="fa fa-instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <h3 class="sidebar__title">Búsqueda</h3><!-- /.sidebar__title -->
                            <form action="{{ route('news.search') }}" class="sidebar__search-form">
                                <input type="text" id="query" name="query" placeholder="Ingresa algo...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- /.sidebar__single -->

                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Ultimas Noticias</h3><!-- /.sidebar__title -->
                            <div class="sidebar__post-wrap">
                                @foreach ($latestNews as $newsItem)
                                    <div class="sidebar__post__single">
                                        <div class="sidebar__post-image">
                                            <div class="inner-block">
                                                <img src="{{ $newsItem->preview_img_url }}" alt="Awesome Image">
                                            </div>
                                            <!-- /.inner-block -->
                                        </div><!-- /.sidebar__post-image -->
                                        <div class="sidebar__post-content">
                                            <h4 class="sidebar__post-title">
                                                <a href="{{ route('news.show', $newsItem->id_new) }}">{{ $newsItem->tit_new }}</a>
                                            </h4>
                                            <!-- /.sidebar__post-title -->
                                        </div><!-- /.sidebar__post-content -->
                                    </div><!-- /.sidebar__post__single -->
                                @endforeach
                            </div><!-- /.sidebar__post-wrap -->
                        </div><!-- /.sidebar__single -->
                        
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <ul class="sidebar__tags-list">
                                @foreach($randomTags as $tag)
                                    <li class="sidebar__tags-list-item"><a href="{{ route('news.searchByTag', ['tag' => trim($tag)]) }}">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
