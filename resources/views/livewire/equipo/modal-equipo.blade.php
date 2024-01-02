<div>
    <div wire:ignore.self class="modal fade" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="modal-Equipo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">{{ $tituloModal }}</h3>
                            @if ($accion != 'ver')
                                <p class="mb-0">Ingresa los siguientes datos:</p>
                            @endif
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nombre del equipo</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre"
                                                aria-label="Nombre" aria-describedby="nombre-addon"
                                                wire:model.defer="nombre"
                                                {{ $this->accion == 'ver' ? 'readonly' : '' }}>
                                        </div>
                                        @error('nombre')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label>Correo</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Ejemplo@gmail.com"
                                                aria-label="Correo" aria-describedby="correo-addon"
                                                wire:model.defer="correo"
                                                {{ $this->accion == 'ver' ? 'readonly' : '' }}>
                                        </div>
                                        @error('correo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @if (isset($errores['correo']))
                                            <p class="text-danger">{{ $errores['correo'][0] }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label>Descripción</label>
                                        <div class="input-group mb-3">
                                            <textarea type="text" class="form-control" placeholder="" aria-label="Descripcion"
                                                aria-describedby="descripcion-addon" wire:model.defer="descripcion" {{ $this->accion == 'ver' ? 'readonly' : '' }}></textarea>
                                        </div>
                                        @error('descripcion')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Iglesia</label>
                                        <select class="form-control mb-3" wire:model.defer="iglesia_id"
                                            {{ $this->accion == 'ver' ? 'readonly' : '' }}>
                                            <option value="" readonly selected>Seleccione una Iglesia</option>
                                            @foreach ($this->data['data'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('iglesia_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    @if ($accion != 'ver')
                                        <div class="col-6">
                                            <div class="text-center">
                                                <button type="button"
                                                    class="btn btn-admin bg-gradient-marron btn-md w-100 mt-4 mb-0"
                                                    wire:click="guardar('{{ $accion }}')">Guardar</button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-{{ $this->accion == 'ver' ? '12' : '6' }}">
                                        <div class="text-center {{ $this->accion == 'ver' ? 'col-4 mx-auto' : '' }}">
                                            <button type="button"
                                                class="btn btn-admin bg-gradient-marron-oscuro btn-md w-100 mt-4 mb-0"
                                                data-bs-dismiss="modal-Equipo"
                                                wire:click="salir()">{{ $this->accion == 'ver' ? 'Salir' : 'Cancelar' }}</button>
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
