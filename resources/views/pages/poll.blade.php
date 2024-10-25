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

    <!--Reuso de css-->
    <section class="event-details">
        <div class="container">
            <div class="row">
                @foreach ($partyVotes['parties'] as $party)
                    <div class="col-lg-6 wow fadeInLeft animated same-height"
                        style="visibility: visible; animation-name: fadeInLeft;">
                        <button id="{{ $party }}" type="button" class="btn btn-primary btn-lg">
                            {{ $party }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('polls');
        const datos = {
            labels: {!! json_encode($partyVotes['parties']) !!},
            datasets: [{
                label: 'Votos',
                data: {!! json_encode($partyVotes['votes']) !!},
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: datos
        });
    </script>
@endsection
