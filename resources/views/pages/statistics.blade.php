@extends('layouts.app')

@section('title', 'Estadisticas de las votaciones')

@section('content')
    <h1>Votaciones 2024-2028</h1>
    <section class="chart-container" style="width: 50%; margin: auto;">
        <canvas id="voteChart"></canvas>
    </section>
    {{-- libreria chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    {{-- js para la peticion asincrona y uso de la libreria --}}
    <script src="{{ asset('assets/js/statistics.js') }}"></script>
@endsection
