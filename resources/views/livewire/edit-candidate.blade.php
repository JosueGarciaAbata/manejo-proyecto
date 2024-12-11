<div>
    <button class="btn btn-primary btn-sm" wire:click="openModal" class="btn btn-primary">
        Editar
    </button>

    <div class="modal fade @if ($isOpen) show @endif" tabindex="-1" role="dialog"
        style="display: @if ($isOpen) block @else none @endif;" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex flex-md-row mt-3 mx-3">
                    <h5 class="modal-title">Editar registro</h5>
                    <button type="button" class="btn btn-danger rounded px-3" wire:click="closeModal">Cerrar</button>
                </div>
                <div class="modal-body p-4 mb-3">
                    <form wire:submit.prevent="editCandidate">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" class="form-control" wire:model="candidate.nom_can">
                            @error('candidate.nom_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" id="last_name" class="form-control" wire:model="candidate.ape_can">
                            @error('candidate.ape_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Cargo</label>
                            <input type="text" id="position" class="form-control" wire:model="candidate.car_can">
                            @error('candidate.car_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="entry_date" class="form-label">Fecha de Ingreso</label>
                            <input type="date" id="entry_date" class="form-control"
                                wire:model="candidate.fec_ing_can">
                            @error('candidate.fec_ing_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div>
                            <label for="ruta_can">Imagen (opcional):</label>
                            <input type="file" wire:model="candidate.ruta_can">
                            @error('candidate.ruta_can')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <!-- Previsualización de la imagen cargada -->
                            @if (!empty($candidate['ruta_can']))
                                <img src="{{ asset($candidate['ruta_can']) }}" alt="Imagen del Candidato"
                                    width="150">
                            @endif
                        </div> --}}

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" class="form-control" wire:model="candidate.descrip_can"></textarea>
                            @error('candidate.descripcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
