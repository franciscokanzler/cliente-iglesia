<div>
    <div wire:ignore.self class="modal fade" id="modalCrearMiembro" tabindex="-1" role="dialog" aria-labelledby="modal-CrearMiembro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">Agregar nuevo Miembro</h3>
                            <p class="mb-0">Ingresa los siguientes datos:</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Nombre</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre"
                                                aria-label="Nombre" aria-describedby="nombre-addon" wire:model.defer="nombre">
                                        </div>
                                        @error('nombre')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Apellido"
                                                aria-label="Apellido" aria-describedby="apellido-addon" wire:model.defer="apellido">
                                        </div>
                                        @error('apellido')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento"
                                                aria-label="Fecha de Nacimiento" aria-describedby="fecha_nacimiento-addon" wire:model.defer="fecha_nacimiento">
                                        </div>
                                        @error('fecha_nacimiento')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Número de identidad</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="V/E-1234567890"
                                                aria-label="Número de identidad" aria-describedby="ci-addon" wire:model.defer="ci">
                                        </div>
                                        @error('ci')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Edad</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Edad"
                                                aria-label="Edad" aria-describedby="edad-addon" wire:model.defer="edad">
                                        </div>
                                        @error('edad')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Teléfono</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="0412-1234567"
                                                aria-label="Teléfono" aria-describedby="telefono-addon" wire:model.defer="telefono">
                                        </div>
                                        @error('telefono')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Correo</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Correo"
                                                aria-label="Correo" aria-describedby="correo-addon" wire:model.defer="correo">
                                        </div>
                                        @error('correo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Número de Casa</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Número de Casa"
                                                aria-label="Número de Casa" aria-describedby="nro_casa-addon" wire:model.defer="nro_casa">
                                        </div>
                                        @error('nro_casa')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Calle</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Calle"
                                                aria-label="Calle" aria-describedby="calle-addon" wire:model.defer="calle">
                                        </div>
                                        @error('calle')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Apellido"
                                                aria-label="Apellido" aria-describedby="apellido-addon" wire:model.defer="apellido">
                                        </div>
                                        @error('apellido')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento"
                                                aria-label="Fecha de Nacimiento" aria-describedby="fecha_nacimiento-addon" wire:model.defer="fecha_nacimiento">
                                        </div>
                                        @error('fecha_nacimiento')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Número de identidad</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="V/E-1234567890"
                                                aria-label="Número de identidad" aria-describedby="ci-addon" wire:model.defer="ci">
                                        </div>
                                        @error('ci')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Edad</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Edad"
                                                aria-label="Edad" aria-describedby="edad-addon" wire:model.defer="edad">
                                        </div>
                                        @error('edad')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Teléfono</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="0412-1234567"
                                                aria-label="Teléfono" aria-describedby="telefono-addon" wire:model.defer="telefono">
                                        </div>
                                        @error('telefono')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Correo</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Correo"
                                                aria-label="Correo" aria-describedby="correo-addon" wire:model.defer="correo">
                                        </div>
                                        @error('correo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Número de Casa</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Número de Casa"
                                                aria-label="Número de Casa" aria-describedby="nro_casa-addon" wire:model.defer="nro_casa">
                                        </div>
                                        @error('nro_casa')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <label>Nombre de la iglesia</label>
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
                                            <button type="button" class="btn btn-admin bg-gradient-marron btn-md w-100 mt-4 mb-0" wire:click="guardar">Guardar</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-admin bg-gradient-marron-oscuro btn-md w-100 mt-4 mb-0" data-bs-dismiss="modal-CrearIglesia" wire:click="borrar()">Cancelar</button>
                                        </div>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
