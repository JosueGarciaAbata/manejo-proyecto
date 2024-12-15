<div>
    <!-- Botón para abrir el modal -->
    <div class="d-flex flex-column align-items-end">
        <button wire:click="openModal" class="btn btn-primary">
            Agregar Nuevo Candidato
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade @if ($isOpen) show @endif" tabindex="-1" role="dialog"
        style="display: @if ($isOpen) block @else none @endif;" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex flex-md-row mt-3 mx-3">
                    <h5 class="modal-title">Nuevo registro</h5>
                    <button type="button" class="btn btn-danger rounded px-3" wire:click="closeModal">Cerrar</button>
                </div>
                <div class="modal-body p-4 mb-3">
                    <form wire:submit.prevent="saveCandidate" class="d-flex flex-column gap-3">
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" class="form-control" wire:model="nom_can">
                            @error('nom_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" id="last_name" class="form-control" wire:model="ape_can">
                            @error('ape_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3">
                            <label for="position" class="form-label">Cargo</label>
                            <input type="text" id="position" class="form-control" wire:model="car_can">
                            @error('car_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Lider, sublider, integrante --}}
                        <div class="mb-3">
                            <label for="jerarquia" class="form-label">Rol</label>
                            <select wire:model="jerarquia" id="jerarquia" class="form-control">
                                <option value="">Seleccione una jerarquía</option>
                                <option value="lider">Líder</option>
                                <option value="sublider">Sublíder</option>
                                <option value="integrante">Integrante</option>
                            </select>
                            @error('jerarquia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Experiencia profesional -------------- --}}
                        <h5>Experiencia Profesional</h5>
                        <div class="mb-3">
                            <!-- Input para agregar experiencia -->
                            <input type="text" wire:model="newExperience" wire:keydown.enter.prevent="addExperience"
                                placeholder="Añadir experiencia y presiona Enter" />
                            <button type="button" wire:click="addExperience"
                                class="btn btn-primary btn-sm">Agregar</button>
                        </div>

                        <!-- Mostrar experiencias agregadas como chips -->
                        @if (count($experiences) > 0)
                            <div class="mb-3">
                                @foreach ($experiences as $index => $exp)
                                    <span class="badge bg-secondary me-2">
                                        {{ $exp }}
                                        <button type="button" wire:click="removeExperience({{ $index }})"
                                            class="btn btn-danger btn-sm">&times;</button>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        {{-- End experiencia profesional ------------- --}}

                        {{-- Educación -------------- --}}
                        <h5>Formación</h5>
                        <div class="mb-3">
                            <!-- Input para agregar educación -->
                            <input type="text" wire:model="newEducation" wire:keydown.enter.prevent="addEducation"
                                placeholder="Añadir educación y presiona Enter" />
                            <button type="button" wire:click="addEducation"
                                class="btn btn-primary btn-sm">Agregar</button>
                        </div>

                        <!-- Mostrar educaciones agregadas como chips -->
                        @if (count($educations) > 0)
                            <div class="mb-3">
                                @foreach ($educations as $index => $edu)
                                    <span class="badge bg-secondary me-2">
                                        {{ $edu }}
                                        <button type="button" wire:click="removeEducation({{ $index }})"
                                            class="btn btn-danger btn-sm">&times;</button>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        {{-- End educación ------------- --}}

                        <!-- Fecha de Ingreso -->
                        <div class="mb-3">
                            <label for="entry_date" class="form-label">Fecha de Ingreso</label>
                            <input type="date" id="entry_date" class="form-control" wire:model="fec_ing_can">
                            @error('fec_ing_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" class="form-control" wire:model="descrip_can" rows="2"
                                style="width: 100%; margin: 0; resize: none"></textarea>
                            @error('descrip_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="image">Imagen (opcional):</label>
                            <input type="file" wire:model="image" accept="image/png, image/jpeg, image/jpg">
                            @error('image')
                                <span class="error">{{ $message }}</span>
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
