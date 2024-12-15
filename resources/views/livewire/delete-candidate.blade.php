<div>
    <a href="#" wire:click.prevent='openModal' class="card-btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-minus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M9 12l6 0" />
        </svg>
        Delete</a>

    <!-- Modal de Confirmación -->
    <div class="modal fade @if ($isOpen) show @endif"
        style="display: @if ($isOpen) block @else none @endif;" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar el candidato <strong>{{ $candidate['nom_can'] }}
                            {{ $candidate['ape_can'] }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteCandidate">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
