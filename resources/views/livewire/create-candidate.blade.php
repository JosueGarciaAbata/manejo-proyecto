<div>
    <!-- Botón para abrir el modal -->
    <button wire:click="openModal" class="btn btn-primary">
        Agregar Nuevo Candidato
    </button>

    <!-- Modal -->
    <div class="modal fade {{ $isOpen ? 'show' : '' }}" tabindex="-1" role="dialog"
        style="{{ $isOpen ? 'display: block;' : 'display: none;' }}" aria-labelledby="exampleModalLabel"
        aria-hidden="{{ $isOpen ? 'false' : 'true' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Nuevo Candidato</h5>
                    <button type="button" class="btn-close" wire:click="closeModal">Cerrar</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveCandidate">
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" id="last_name" class="form-control" wire:model="last_name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3">
                            <label for="position" class="form-label">Cargo</label>
                            <input type="text" id="position" class="form-control" wire:model="position">
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Fecha de Ingreso -->
                        <div class="mb-3">
                            <label for="entry_date" class="form-label">Fecha de Ingreso</label>
                            <input type="date" id="entry_date" class="form-control" wire:model="entry_date">
                            @error('entry_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" class="form-control" wire:model="description" rows="3"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Partido politico --}}
                        <div class="mb-3">
                            <label for="id_pol_par_bel" class="form-label">Partido Político</label>
                            <select id="id_pol_par_bel" class="form-control" wire:model="id_pol_par_bel">
                                <option value="">Seleccione un partido</option>
                                @foreach ($politicalParties as $party)
                                    <option value="{{ $party->id_lis }}">{{ $party->nom_lis }}</option>
                                @endforeach
                            </select>
                            @error('id_pol_par_bel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botón Guardar -->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
