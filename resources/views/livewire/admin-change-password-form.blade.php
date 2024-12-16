<div>

    <form method="post" wire:submit.prevent='ChangePassword()'>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Contraseña Actual</label>
                    <input type="password" class="form-control" name="example-text-input"
                        placeholder="Ingresa tu contraseña actual" wire:model='current_password'>
                    <span class="text-danger">
                        @error('current_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="example-text-input"
                        placeholder="Ingresa tu nueva contraseña" wire:model='new_password'>
                    <span class="text-danger">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="example-text-input"
                        placeholder="Ingresa nuevamente la nueva contraseña" wire:model='confirm_new_password'>
                    <span class="text-danger">
                        @error('confirm_new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-samsungpass">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 10m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                <path d="M7 10v-1.862c0 -2.838 2.239 -5.138 5 -5.138s5 2.3 5 5.138v1.862" />
                <path
                    d="M10.485 17.577c.337 .29 .7 .423 1.515 .423h.413c.323 0 .633 -.133 .862 -.368a1.27 1.27 0 0 0 .356 -.886c0 -.332 -.128 -.65 -.356 -.886a1.203 1.203 0 0 0 -.862 -.368h-.826a1.2 1.2 0 0 1 -.861 -.367a1.27 1.27 0 0 1 -.356 -.886c0 -.332 .128 -.651 .356 -.886a1.2 1.2 0 0 1 .861 -.368h.413c.816 0 1.178 .133 1.515 .423" />
            </svg>
            Cambiar contraseña
        </button>
    </form>

</div>
