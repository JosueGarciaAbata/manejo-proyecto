@extends('layouts.app')

@section('title', 'Votaciones')

@section('content')

    <section class="inner-banner">
        <div class="container">
            <h2 class="inner-banner__title">Vota Ahora!</h2><!-- /.inner-banner_title -->
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul><!-- /.list-unstyled -->
        </div><!-- /.container -->
    </section>
    <div>
        <canvas id="polls"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('polls');
        const datos = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
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
