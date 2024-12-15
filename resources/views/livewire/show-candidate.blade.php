<div>
    <section class="candidates-section-admin">
        <div class="container">
            <div class="row">
                @forelse ($candidates as $candidate)
                    <div class="col-sm-6">
                        <div class="candidate-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="cd-pic" id="{{ $candidate->id_can }}">
                                        <img src="{{ asset($candidate->ruta_can) }}" alt="{{ $candidate->car_can }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="cd-text">
                                        <div class="cd-title">
                                            <h4>
                                                <a href="{{ route('candidate', ['id' => $candidate->id_can]) }}">
                                                    {{ $candidate->nom_can }} {{ $candidate->ape_can }}
                                                </a>
                                            </h4>
                                            <span>{{ $candidate->car_can }}</span>
                                            <span>{{ $candidate->tit_can }}</span>
                                            <span>{{ $candidate->fec_ing_can }}</span>
                                        </div>

                                        <div class="actions mt-2">
                                            <div class="candidate-actions">
                                                @livewire('edit-candidate', ['candidate' => $candidate], key('edit-' . $candidate->id_can))
                                                @livewire('delete-candidate', ['candidate' => $candidate], key('delete-' . $candidate->id_can))
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No hay candidatos por el momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
