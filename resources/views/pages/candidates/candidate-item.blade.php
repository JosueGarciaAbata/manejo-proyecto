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
                          <button class="btn btn-primary btn-sm"
                              wire:click="editCandidate({{ $candidate->id_can }})">Editar</button>
                          <button class="btn btn-danger btn-sm"
                              wire:click="deleteCandidate({{ $candidate->id_can }})">Eliminar</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
