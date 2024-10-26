@extends('layouts.app')

@section('title', 'Votaciones')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Tu voto es importante!</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section>

    <section class="poll-results">
        <div class="container">
            <canvas id="polls"></canvas>
        </div>
    </section>

    <!---->
    <section class="event-details">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < count($partyVotes) - 1; $i++)
                    <div class="col-sm-6">
                        <div class="party-item">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="campaing-one__single">
                                        <div class="party-id" id="{{ $partyVotes['ids'][$i] }}">
                                            <div class="cd-title">
                                                <h3 class="campaing-one__title">{{ $partyVotes['names'][$i] }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('polls');
        const datos = {
            labels: {!! json_encode($partyVotes['names']) !!},
            datasets: [{
                label: 'Votos',
                data: {!! json_encode($partyVotes['votes']) !!},
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hovesrOffset: 4
            }]
        };
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: datos
        });
    </script>

    <!-- Modal para agregar votos -->
    <section id="container-add-vote" class="modal">
        <article class="contenido-modal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Tu voto es importante</h2>
                            <p>Elige con responsabilidad, integridad y honestidad</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <form action="{{ route('vote.party') }}" method="POST" class="mailchimp-one__form add-vote">
                            @csrf
                            <input type="hidden" name='id_lis' id="id_lis" value="">
                            <input type="text" name='ema_vot' placeholder="Email">
                            <button type="submit" class="thm-btn mailchimp-one__form-btn">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <span class="cerrar">&times;</span>

        </article>
    </section>
    <script src="{{ asset('assets/js/party.js') }}"></script>
@endsection
