<div>
    <!-- Botón para abrir el modal -->
    <button class="btn btn-danger btn-sm" wire:click="openModal">
        Eliminar
    </button>

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
