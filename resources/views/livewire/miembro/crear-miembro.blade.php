<div>
    <div wire:ignore.self class="modal fade" id="modalCrearMiembro" tabindex="-1" role="dialog"
        aria-labelledby="modal-CrearMiembro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">Agregar nuevo Miembro</h3>
                            <p class="mb-0">Ingresa los siguientes datos:</p>
                            {{-- @error('*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="card-body">
                            <x-miembro_form/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
