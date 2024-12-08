<div>

    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('success-password-change'))
        <div class="alert alert-success">
            {{ Session::get('success-password-change') }}
        </div>
    @endif

    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Inicia sesión en tu cuenta</h2>
            <form wire:submit.prevent="LoginHandler()" method="POST" novalidate>
                <div class="mb-3">
                    <label class="form-label">Correo electrónico o nombre de usuario</label>
                    <input type="text" class="form-control" placeholder="tu@email.com o Nombre de usuario"
                        wire:model="login_id">
                    @error('login_id')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Contraseña
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Tu contraseña" wire:model="password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Mostrar contraseña"
                                data-bs-toggle="tooltip"><!-- Descargar icono SVG de http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </div>
            </form>
        </div>


    </div>

</div>
