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

    <!-- Reuso de CSS -->
    <section class="event-details">
        <div class="container">
            <div class="row">
                <form action="{{ route('home') }}" method="GET">
                    @foreach($partyVotes['parties'] as $party)
                    
                    @endforeach
                </form>
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
                ],
                hoverOffset: 4
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
                        <form action="{{ route('vote.store') }}" method="POST" class="mailchimp-one__form add-vote">
                            @csrf
                            <input type="hidden" name="id_can" id="id_can" value="">
                            <input type="text" name="ema_vot" placeholder="Email" required>
                            <button type="submit" class="thm-btn mailchimp-one__form-btn">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <span class="cerrar">&times;</span>
        </article>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("container-add-vote");
            const closeBtn = document.querySelector(".cerrar");
            const formModal = document.getElementById("form-add-vote");

            const candidates = document.querySelectorAll(".candidate-item");

            const closeModal = modalContainer => {
                if (modalContainer) modalContainer.style.display = "none";
            };

            closeBtn.addEventListener("click", (e) => {
                const modalContainer = closeBtn.closest(".modal");
                closeModal(modalContainer);
            });

            candidates.forEach(candidate => {
                candidate.addEventListener("click", () => modal.style.display = "block");
                const candidateId = candidate.querySelector(".cd-pic").id;
                document.getElementById("id_can").value = candidateId;
            });

            window.addEventListener("click", (event) => {
                if (event.target.classList.contains("modal")) {
                    const modals = document.querySelectorAll(".modal");
                    modals.forEach(modal => closeModal(modal));
                }
            });
        });
    </script>
@endsection
