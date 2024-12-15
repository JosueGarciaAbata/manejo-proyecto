<div>
    <!-- Editar usando enlace -->
    <a href="#" wire:click.prevent="openModal" class="card-btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
            <path d="M16 5l3 3" />
        </svg>
        Edit
    </a>

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

                        {{-- Para la experiencia profesional --}}
                        <div class="mb-3">
                            <label for="experiences" class="form-label">Experiencias Profesionales</label>

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

                            <div class="mb-3">
                                <!-- Input para agregar experiencia -->
                                <input type="text" wire:model="newExperience"
                                    wire:keydown.enter.prevent="addExperience"
                                    placeholder="Añadir experiencia y presiona Enter" />
                                <button type="button" wire:click="addExperience"
                                    class="btn btn-primary btn-sm">Agregar</button>
                            </div>

                        </div>

                        {{-- Para la foramción --}}
                        <div class="mb-3">
                            <label for="educations" class="form-label">Formación</label>

                            <!-- Mostrar experiencias agregadas como chips -->
                            @if (count($educations) > 0)
                                <div class="mb-3">
                                    @foreach ($educations as $index => $exp)
                                        <span class="badge bg-secondary me-2">
                                            {{ $exp }}
                                            <button type="button" wire:click="removeEducation({{ $index }})"
                                                class="btn btn-danger btn-sm">&times;</button>
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mb-3">
                                <!-- Input para agregar experiencia -->
                                <input type="text" wire:model="newEducation"
                                    wire:keydown.enter.prevent="addEducation"
                                    placeholder="Añadir experiencia y presiona Enter" />
                                <button type="button" wire:click="addEducation"
                                    class="btn btn-primary btn-sm">Agregar</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="entry_date" class="form-label">Fecha de Ingreso</label>
                            <input type="date" id="entry_date" class="form-control"
                                wire:model="candidate.fec_ing_can">
                            @error('candidate.fec_ing_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Imagen --}}
                        <div>
                            <label for="ruta_can">Imagen (opcional):</label>
                            <input type="file" wire:model="ruta_can" accept="image/*">
                            @error('ruta_can')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <!-- Previsualización de la imagen cargada -->
                            @if ($ruta_can)
                                <img src="{{ $ruta_can->temporaryUrl() }}" alt="Previsualización" width="150">
                            @elseif (!empty($candidate['ruta_can']))
                                <img src="{{ asset('storage/' . $candidate['ruta_can']) }}"
                                    alt="Imagen del Candidato" width="150">
                            @endif
                        </div>

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
