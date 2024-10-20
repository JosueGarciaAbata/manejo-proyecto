<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body>
    @include('layouts.navbar')
 
    <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section">
            <div class="container">
                <div clasS="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>Conoce nuestros candidatos</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Breadcrumb Section End -->
    
    @foreach ($candidates as $candidate)
        <!-- Candidates Section Begin -->
        <section class="candidates-section">
        <div class="container">
            <div class="row">
                {{-- Prueba 1 --}}
                <div class="col-sm-6">
                    <div class="candidate-item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cd-pic">
                                    <img src="resources/img/ {{ $candidate->imagen }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cd-text">
                                    <div class="cd-title">
                                       <h4>{{ $candidate->nombre }}, {{ $candidate->apellido }}</h4>
                                       <span>{{ $candidate->cargo }}</span>
                                       <span>{{ $candidate->titulo }}</span>
                                       <span>{{ $candidate->fecha_ingreso }}</span>
                                    {{-- Información sobre el candidato --}}
                                    </div>
                                    {{-- El candidato tiene muchas propuestas --}}
                                     <p>Businesses often become known today through effective marketing. The marketing
                                        may be in the form of a regular news item or half column society news in the
                                        Sunday newspaper.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Candidates Section End -->
    @endforeach

    @include('layouts.footer')
</body>

</html>

