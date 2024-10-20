@extends('layouts.app')

@section('title', 'Candidates')

@push('css')
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
@endpush

@section('content')
    
@foreach ($cantidates as $candidate)
        <section class="candidates section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="candidate-item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="si-pic">
                                    <img src="resources/img/ruta_imagen" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="si-text">
                                    <div class="si-title">
                                    {{-- Información sobre el candidato --}}
                                    </div>
                                    {{-- El candidato tiene muchas propuestas --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

@endsection

@push('js')
    
@endpush