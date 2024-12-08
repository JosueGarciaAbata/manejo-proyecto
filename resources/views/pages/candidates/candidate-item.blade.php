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
                  </div>
              </div>
          </div>
      </div>
  </div>
