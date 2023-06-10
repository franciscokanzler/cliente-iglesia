<div>
    <div wire:ignore.self class="modal fade" id="modalEditarIglesia" tabindex="-1" role="dialog" aria-labelledby="modal-EditarIglesia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">Editar iglesia</h3>
                            <p class="mb-0">Ingresa los siguientes datos:</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <label>Nombre de la iglesia</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre"
                                        aria-label="Nombre" aria-describedby="nombre-addon" wire:model.defer="nombre">
                                </div>
                                @error('nombre')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <label>Correo</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Ejemplo@gmail.com"
                                        aria-label="Correo" aria-describedby="correo-addon" wire:model.defer="correo">
                                </div>
                                @error('correo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <label>Fecha Inauguración</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" placeholder="Fecha Inauguración"
                                        aria-label="Fecha" aria-describedby="fecha-addon" wire:model.defer="fecha">
                                </div>
                                @error('fecha')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-admin bg-gradient-marron btn-md w-100 mt-4 mb-0" wire:click="update">Editar</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-admin bg-gradient-marron-oscuro btn-md w-100 mt-4 mb-0" data-bs-dismiss="modal-EditarIglesia" wire:click="borrar()">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

