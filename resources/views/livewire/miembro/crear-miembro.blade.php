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
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <div class="row">
                                    <div class="stepwizard">
                                        <div class="stepwizard-row setup-panel">
                                            <div class="multi-wizard-step">
                                                <a href="#step-1" type="button" wire:click="back(1)"
                                                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}">1</a>
                                                <p>Datos Personales</p>
                                            </div>
                                            <div class="multi-wizard-step">
                                                <a href="#step-2" type="button" wire:click="back(2)"
                                                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}">2</a>
                                                <p>Iglesia</p>
                                            </div>
                                            <div class="multi-wizard-step">
                                                <a href="#step-3" type="button" wire:click="back(3)"
                                                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}"
                                                    disabled="disabled">3</a>
                                                <p>Dirección</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
                                    <div class="col-6">
                                        <label>Nombre</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre"
                                                aria-label="Nombre" aria-describedby="nombre-addon"
                                                wire:model.defer="nombre">
                                        </div>
                                        @error('nombre')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Apellido"
                                                aria-label="Apellido" aria-describedby="apellido-addon"
                                                wire:model.defer="apellido">
                                        </div>
                                        @error('apellido')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Correo</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Correo"
                                                aria-label="Correo" aria-describedby="correo-addon"
                                                wire:model.defer="correo">
                                        </div>
                                        @error('correo')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Teléfono</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="0412-1234567"
                                                aria-label="Teléfono" aria-describedby="telefono-addon"
                                                wire:model.defer="telefono">
                                        </div>
                                        @error('telefono')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento"
                                                aria-label="Fecha de Nacimiento"
                                                aria-describedby="fechaNacimiento-addon"
                                                wire:model="fechaNacimiento">
                                        </div>
                                        @error('fechaNacimiento')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6 {{ $edad < 9 ? 'display-none' : '' }}">
                                        <label>Número de identificación</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="V/E-1234567890"
                                                aria-label="Número de identidad" aria-describedby="ci-addon"
                                                wire:model="ci">
                                        </div>
                                        @error('ci')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6 {{ $ci == "" ? 'display-none' : '' }}">
                                        <label>Estado Civil</label>
                                        <select class="form-control mb-3" wire:model.defer="estado_civil_id">
                                            <option value="" readonly selected>Seleccione un estado</option>
                                            @foreach ($data["estadocivil"] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('estado_civil_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn bg-gradient-marron-oscuro text-light text-bold btn-sm d-flex justify-end" wire:click="firstStepSubmit" type="button">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
                                    <div class="col-6">
                                        <label>Iglesia</label>
                                        <select class="form-control mb-3" wire:model.defer="iglesia_id">
                                            <option value="" readonly selected>Seleccione una Iglesia</option>
                                            @foreach ($data["iglesia"] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('iglesia_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Rango</label>
                                        <select class="form-control mb-3" wire:model="rango_id">
                                            <option value="0" selected readonly>Seleccione un Rango</option>
                                            @foreach ($data["rango"] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('rango_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn bg-gradient-marron-oscuro text-light text-bold nextBtn btn-sm pull-right" type="button" wire:click="back(1)">Back</button>
                                        <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right" type="button"
                                            wire:click="secondStepSubmit">Next</button>
                                    </div>
                                </div>
                                <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
                                    <div class="col-6">
                                        <label>Estado</label>
                                        <select class="form-control mb-3" wire:model.defer="estado_id" wire:change="Municipio($event.target.value)">
                                            <option value="" readonly selected>Seleccione un estado</option>
                                            @foreach ($data["estado"] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('estado_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Municipio</label>
                                        <select class="form-control mb-3" wire:model="municipio_id" wire:change="Parroquia($event.target.value)">
                                            <option value="0" selected readonly>Seleccione un municipio</option>
                                            @if ($municipio)
                                                @foreach ($municipio as $mun)
                                                    <option value="{{ $mun['id'] }}">{{ $mun['nombre'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('municipio_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Parroquia</label>
                                        <select class="form-control mb-3" wire:model.defer="parroquia_id">
                                            <option value="0" selected readonly>Seleccione una parroquia</option>
                                            @if ($parroquia)
                                                @foreach ($parroquia as $parr)
                                                    <option value="{{ $parr['id'] }}">{{ $parr['nombre'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('parroquia_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Número de Casa</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Número de Casa"
                                                aria-label="Número de Casa" aria-describedby="nro_casa-addon"
                                                wire:model.defer="nro_casa">
                                        </div>
                                        @error('nro_casa')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label>Calle</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Calle"
                                                aria-label="Calle" aria-describedby="calle-addon"
                                                wire:model.defer="calle">
                                        </div>
                                        @error('calle')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn bg-gradient-marron-oscuro text-light text-bold nextBtn btn-sm pull-right" type="button" wire:click="back(2)">Back</button>
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
