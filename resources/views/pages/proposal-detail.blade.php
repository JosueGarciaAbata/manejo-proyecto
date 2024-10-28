@extends('layouts.app')

@section('title', 'Proposal')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">{{ $proposal->tit_pro }}</h2><!-- /.inner-banner__title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('proposals') }}">Proposal</a></li>
                <li>{{ $proposal->tit_pro }}</li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->


    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-one__single">
                        @if(($proposal->img_pro) != null)
                            <div class="blog-one__image">
                                <img src="{{ asset('assets/images/resources/' . $proposal->img_pro) }}" alt="proposal image">
                            </div>
                        @endif
                        <div class="blog-one__content">
                            <ul class="list-unstyled blog-one__meta">
                                <li>{{ $proposal->candidate->nom_can }} {{  $proposal->candidate->ape_can  }}</li>
                                <li>{{ \Carbon\Carbon::parse($proposal->fec_ini_pro)->format('d F, Y') }}</li>
                            </ul>
                            <h3 class="blog-one__title">
                                {{ $proposal->tit_pro }}
                            </h3>
                            <p class="blog-one__text">
                                {{ $proposal->des_pro }}
                            </p>
                            <div class="share-block">
                                <div class="left-block">
                                    <p>
                                        Tags
                                        @foreach(explode(',', $proposal->tags_pro) as $tag)
                                            <a href="{{ route('proposals.searchByTag', ['tag' => trim($tag)]) }}">
                                                {{ trim($tag) }}
                                            </a>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-details__author">
                        <div class="blog-details__author-image">
                            <img src="{{ asset($proposal->candidate->ruta_can) }}" alt="candidate image">
                        </div>
                        <div class="blog-details__author-content">
                            <h3>
                                <a href="{{ route('candidate', ['id' => $proposal->id_can_pro]) }}">
                                    {{ $proposal->candidate->nom_can }} {{  $proposal->candidate->ape_can  }}
                                </a>
                            </h3>
                            <p>
                                {{ $proposal->candidate->descrip_can }}
                            </p>
                        </div>
                    </div>
                </div><!-- /.col-lg-5 Borra hasta aca-->
            </div><!-- /.row -->
        </div><!-- /.container -->

    </section>
@endsection
