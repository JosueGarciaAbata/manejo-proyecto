<div>
    <section class="candidates-section-admin">
        <div class="container">
            <div class="row">
                @forelse ($candidates as $candidate)
                    <div class="col-md-4 col-lg-3 mb-4 me-3">
                        <!-- Card -->
                        <div class="card shadow-sm">
                            <!-- Imagen del Candidato -->
                            <div class="card-img-top text-center" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $candidate->ruta_can) }}" alt="{{ $candidate->car_can }}"
                                    class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                            </div>

                            <!-- Contenido del Candidato -->
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">
                                    <a href="{{ route('candidate', ['id' => $candidate->id_can]) }}"
                                        class="text-decoration-none text-primary">
                                        {{ $candidate->nom_can }} {{ $candidate->ape_can }} es
                                        {{ $candidate->jerarquia }}
                                    </a>
                                </h5>
                                <p class="mb-1 text-muted"><strong>Cargo:</strong> {{ $candidate->car_can }}</p>
                                <p class="mb-1 text-muted"><strong>Ingreso:</strong> {{ $candidate->fec_ing_can }}</p>
                            </div>

                            <!-- Acciones (Editar / Eliminar) -->
                            <div class="d-flex justify-content-center align-items-center">
                                @livewire('edit-candidate', ['candidate' => $candidate], key('edit-' . $candidate->id_can . '-' . $loop->index))
                                @livewire('delete-candidate', ['candidate' => $candidate], key('delete-' . $candidate->id_can . '-' . $loop->index))
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-danger">No hay candidatos por el momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
