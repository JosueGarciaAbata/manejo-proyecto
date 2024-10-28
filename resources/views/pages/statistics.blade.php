@extends('layouts.app')

@section('title', 'Estadisticas de las votaciones')

@section('content')

<h1></h1>

<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">Votaciones 2024-2028</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li>Tomemos las decisiones del futuro de la educación, elige con responsabilidad, integridad y honestidad
            </li>
        </ul>
    </div>
</section>

<section class="representant-parties candidate-item">
    <div class="container col-12">
        <div class="row" id="party-list">
        </div>
    </div>
</section>

<section class="voting-results">
    <div class="container">
        <canvas id="votes-statistics"></canvas>
    </div>
</section>


<section id="container-add-vote" class="modal">
    <span class="cerrar">&times;</span>
    <article class="contenido-modal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Juntos formamos la mejor universidad</h2>
                        <p>Tu voto es anonimo</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <form action="" method="POST" class="mailchimp-one__form add-vote">
                        @csrf
                        <input type="hidden" name='id_lis' id="id_lis" value="">
                        <input type="text" name='ema_vot' placeholder="Email">
                        <button type="submit" class="thm-btn mailchimp-one__form-btn">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
</section>
<!-- de momento -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script src="{{ asset('assets/js/statistics.js') }}"></script>
@endsection