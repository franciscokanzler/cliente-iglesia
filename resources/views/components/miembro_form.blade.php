<form role="form text-left">
    <div class="row">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="multi-wizard-step">
                    <a href="#step-1" type="button" wire:click="formStep(1)"
                        class="btn {{ $this->currentStep != 1 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}">1</a>
                    {{-- <p>Datos Personales</p> --}}
                </div>
                <div class="multi-wizard-step">
                    <a href="#step-2" type="button" wire:click="formStep(2)"
                        class="btn {{ $this->currentStep != 2 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}">2</a>
                    {{-- <p>Iglesia</p> --}}
                </div>
                <div class="multi-wizard-step">
                    <a href="#step-3" type="button" wire:click="formStep(3)"
                        class="btn {{ $this->currentStep != 3 ? 'btn-default' : 'bg-gradient-marron-oscuro text-light text-bold' }}"
                        disabled="disabled">3</a>
                    {{-- <p>Dirección</p> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $this->currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-6">
            <label>Nombre</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre"
                    aria-describedby="nombre-addon" wire:model.defer="nombre"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('nombre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Apellido</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Apellido" aria-label="Apellido"
                    aria-describedby="apellido-addon" wire:model.defer="apellido"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('apellido')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Correo</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Correo" aria-label="Correo"
                    aria-describedby="correo-addon" wire:model.defer="correo"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('correo')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Teléfono</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0412-1234567" aria-label="Teléfono"
                    aria-describedby="telefono-addon" wire:model.defer="telefono"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('telefono')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Fecha de Nacimiento</label>
            <div class="input-group mb-3">
                <input type="date" class="form-control" placeholder="Fecha de Nacimiento"
                    aria-label="Fecha de Nacimiento" aria-describedby="fechaNacimiento-addon"
                    wire:model="fechaNacimiento" {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('fechaNacimiento')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6 {{ $this->edad < 9 ? 'display-none' : '' }}">
            <label>Número de identificación</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="V/E-1234567890" aria-label="Número de identidad"
                    aria-describedby="ci-addon" wire:model="ci" {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('ci')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6 {{ $this->ci == '' ? 'display-none' : '' }}">
            <label>Estado Civil</label>
            <select class="form-control mb-3" wire:model.defer="estado_civil_id"
                {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="" readonly selected>Seleccione un estado</option>
                @foreach ($this->data['estadocivil'] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                @endforeach
            </select>
            @error('estado_civil_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-12 d-flex mt-3">
            <button class="btn bg-gradient-marron-oscuro text-light text-bold btn-sm justify-end"
                wire:click="formStep(2)" type="button">
                Siguiente
            </button>
            <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right ms-1"
                type="button" wire:click="salir()">
                {{ $this->opcion == 'consultar' ? 'Salir' : 'Cancelar' }}
            </button>
        </div>
    </div>
    <div class="row setup-content {{ $this->currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-6">
            <label>Iglesia</label>
            <select class="form-control mb-3" wire:model.defer="iglesia_id"
                {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="" readonly selected>Seleccione una Iglesia</option>
                @foreach ($this->data['iglesia'] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                @endforeach
            </select>
            @error('iglesia_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Rango</label>
            <select class="form-control mb-3" wire:model="rango_id"
                {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="0" selected readonly>Seleccione un Rango</option>
                @foreach ($this->data['rango'] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                @endforeach
            </select>
            @error('rango_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12 {{ $this->edad > 18 ? 'display-none' : '' }}">
            <label>Ingresar número de identificación del representante</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="V/E-1234567890"
                    aria-label="Número de identificación del representante" aria-describedby="representante_ci-addon"
                    wire:model="representante_ci" {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <button class="btn bg-gradient-marron-oscuro text-light text-bold mb-0" type="button" id=""
                    wire:click="{{ $this->opcion == 'consultar' ? '' : 'buscarRepresentante()' }}">
                    <i class="fa-solid fa-magnifying-glass text-sm d-flex justify-content-center opacity-10"
                        aria-hidden="true"></i>
                </button>
            </div>
            @error('id_representante')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                nombre
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                apellido
                            </th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                fecha de nacimiento
                            </th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                edad
                            </th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                iglesia
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($this->representante != '')
                            <tr class="pb-2">
                                <td>
                                    {{ $this->representante['nombre'] }}
                                </td>
                                <td>
                                    {{ $this->representante['apellido'] }}
                                </td>
                                <td class="align-middle text-center">
                                    {{ $this->representante['fecha_nacimiento'] }}
                                </td>
                                <td class="align-middle text-center">
                                    {{ $this->representante['edad'] }}
                                </td>
                                <td class="align-middle text-center">
                                    {{ $this->representante['iglesia']['nombre'] }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <button class="btn bg-gradient-marron-oscuro text-light text-bold nextBtn btn-sm pull-right"
                type="button" wire:click="formStep(1)">Anterior</button>
            <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right" type="button"
                wire:click="formStep(3)">Siguiente</button>
            <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right"
                type="button" wire:click="salir()">
                {{ $this->opcion == 'consultar' ? 'Salir' : 'Cancelar' }}
            </button>
        </div>
    </div>
    <div class="row setup-content {{ $this->currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-6">
            <label>Estado</label>
            <select class="form-control mb-3" wire:model.defer="estado_id"
                wire:change="Municipio($event.target.value)" {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="" readonly selected>Seleccione un estado</option>
                @foreach ($this->data['estado'] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                @endforeach
            </select>
            @error('estado_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Municipio</label>
            <select class="form-control mb-3" wire:model="municipio_id" wire:change="Parroquia($event.target.value)"
                {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="0" selected readonly>Seleccione un municipio</option>
                @if ($this->municipio)
                    @foreach ($this->municipio as $mun)
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
            <select class="form-control mb-3" wire:model.defer="parroquia_id"
                {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
                <option value="0" selected readonly>Seleccione una parroquia</option>
                @if ($this->parroquia)
                    @foreach ($this->parroquia as $parr)
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
                <input type="number" class="form-control" placeholder="Número de Casa" aria-label="Número de Casa"
                    aria-describedby="nro_casa-addon" wire:model.defer="nro_casa"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('nro_casa')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label>Calle</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Calle" aria-label="Calle"
                    aria-describedby="calle-addon" wire:model.defer="calle"
                    {{ $this->opcion == 'consultar' ? 'readonly' : '' }}>
            </div>
            @error('calle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <button class="btn btn bg-gradient-marron-oscuro text-light text-bold nextBtn btn-sm pull-right"
                type="button" wire:click="formStep(2)">Anterior</button>
            @if ($this->opcion != 'consultar')
                <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right"
                    type="button"
                    wire:click="{{ $this->opcion == 'guardar' ? 'guardar()' : 'actualizar(' . $this->data['miembro_id'] . ')' }}">
                    {{ $this->opcion == 'guardar' ? 'Guardar' : 'Actualizar' }}
                </button>
            @endif
            <button class="btn bg-gradient-marron-claro text-light text-bold nextBtn btn-sm pull-right"
                type="button" wire:click="salir()">
                {{ $this->opcion == 'consultar' ? 'Salir' : 'Cancelar' }}
            </button>
        </div>
    </div>
</form>
