<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-5">
                <h6>{{ ucwords($componente['ruta']) }}</h6>
            </div>
            <div class="col-7 text-end pb-3 px-lg-4">
                <x-boton_menu wire:click="$emit('limpiarModal')" title="Crear"
                    class="btn-admin bg-gradient-marron-oscuro p-0 mx-lg-4" nombreIcono="fa-solid fa-plus"/>
            </div>
        </div>
        <div class="row d-flex">
            <div class="row mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <input type="text" class="form-control col-12" placeholder="Buscar" aria-label="Buscar"
                    aria-describedby="buscar-addon" wire:model.defer="buscar">
            </div>
            <div class="row mb-3 col-12 col-sm-12 col-md-6">
                <select class="btn btn-admin bg-gradient-marron-oscuro p-0 mb-0 w-auto" wire:model.defer="buscarPor">
                    <option value="" selected>Filtar por</option>
                    @foreach ($columnas as $columna)
                        <option value="{{ $columna['tabla'] }}.{{ $columna['columna'] }}">{{ $columna['nombre'] }}
                        </option>
                    @endforeach
                </select>
                <x-boton_menu title="" class="btn-admin bg-gradient-marron ms-1 ms-sm-3 me-0 p-0 col-1"
                    title="Buscar" nombreIcono="fa-solid fa-magnifying-glass" wire:click="buscar" />
                <x-boton_menu wire:click="limpiarFiltros()" title="Limpiar filtros"
                    class="btn-admin bg-gradient-marron-oscuro p-0 ms-1 ms-sm-3 me-0" nombreIcono="fa-solid fa-trash" />
            </div>
        </div>
    </div>
    <div class="card-body px-3 pt-0 pb-2">
        @if ($data == '')
            <img src="assets/img/loading.gif" alt="Carganfo ..." style="width: 5%">
        @else
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            @foreach ($columnas as $key => $columna)
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    <a wire:click="ordenar('{{ $key }}')">
                                        @if ($columna['estado'])
                                            <i
                                                class="fa-solid {{ $columna['orden'] == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                                        @endif
                                        {{ $columna['nombre'] }}
                                    </a>
                                </th>
                            @endforeach
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($this->data != [])
                            @foreach ($this->data as $datos)
                                <tr class="pb-2">
                                    @foreach ($columnas as $key => $value)
                                        <td>
                                            {{ $datos[$key] }}
                                        </td>
                                    @endforeach
                                    <td class="align-middle text-center">
                                        <x-boton_menu wire:click="$emit('read', {{ $datos['id'] }})" title="Ver"
                                            class="btn-admin bg-gradient-marron-claro p-0"
                                            nombreIcono="fa-solid fa-magnifying-glass"/>
                                        <x-boton_menu wire:click="$emit('update', {{ $datos['id'] }})" title="Editar"
                                            class="btn-admin bg-gradient-marron p-0" nombreIcono="fa-solid fa-pen"/>
                                        <x-boton_menu wire:click="eliminar({{ $datos['id'] }})" title="Eliminar"
                                            class="btn-admin bg-gradient-marron-oscuro p-0"
                                            nombreIcono="fa-solid fa-trash" />
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <nav class="navbar-expand-sm">
                    <ul class="pagination mt-4">
                        <div class="row col-12 mx-auto collapse navbar-collapse">
                            <div class="form-group col-12 col-lg-7">
                                <select class="btn btn-admin bg-gradient-marron-oscuro p-0 ms-0 me-0 mb-0 w-auto"
                                    wire:model.defer="page" wire:change="cambiarPag()">
                                    <option value="5" selected>Pag.5</option>
                                    <option value="10">Pag.10</option>
                                    <option value="15">Pag.15</option>
                                    <option value="20">Pag.20</option>
                                    <option value="25">Pag.25</option>
                                    <option value="50">Pag.50</option>
                                    <option value="100">Pag.100</option>
                                </select>
                                <x-boton_menu wire:click="paginar('{{ $prevPage }}')" title="Anterior"
                                    class="btn-admin bg-gradient-marron-claro p-0 col-12 me-sm-2 me-md-3"
                                    nombreIcono="fa fa-angle-left" />
                                <x-boton_menu title=""
                                    class="btn-admin bg-gradient-marron-oscuro p-0 me-sm-2 me-md-3"
                                    nombre="{{ $currentPage }}" data-bs-toggle="dropdown" aria-expanded="false" />
                                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Número de página"
                                            aria-label="Número de página" aria-describedby="nro_pagina-addon"
                                            wire:model.defer="nroPage">
                                        <x-boton_menu title="" class="btn-admin bg-gradient-marron p-0 ms-0"
                                            nombreIcono="fa-solid fa-magnifying-glass"
                                            wire:click="actualizarNroPagina" />
                                    </div>
                                </ul>
                                <x-boton_menu title="" class="btn-admin bg-gradient-marron p-0 me-sm-2 me-md-3"
                                    nombre="de" />
                                <x-boton_menu title=""
                                    class="btn-admin bg-gradient-marron-oscuro p-0 me-sm-2 me-md-3"
                                    nombre="{{ $lastPage }}" wire:click="paginar('{{ $lastPageUrl }}')" />
                                <x-boton_menu wire:click="paginar('{{ $nextPage }}')" title="Siguiente"
                                    class="btn-admin bg-gradient-marron-claro p-0 col-12"
                                    nombreIcono="fa fa-angle-right" />
                            </div>
                        </div>
                    </ul>
                </nav>
                <nav class="d-sm-none">
                    <ul class="pagination mt-4">
                        <div class="row col-12 mx-auto">
                            <div class="row justify-content-center mb-3">
                                <x-boton_menu title=""
                                    class="btn-admin bg-gradient-marron-oscuro p-0 me-sm-2 me-md-3"
                                    nombre="{{ $currentPage }}" data-bs-toggle="dropdown" aria-expanded="false" />
                                <ul class="dropdown-menu px-2 py-3 col-9" aria-labelledby="dropdownMenuButton">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nro. de página"
                                            aria-label="Número de página" aria-describedby="nro_pagina-addon"
                                            wire:model.defer="nroPage">
                                        <x-boton_menu title="" class="btn-admin bg-gradient-marron p-0 ms-0"
                                            nombreIcono="fa-solid fa-magnifying-glass"
                                            wire:click="actualizarNroPagina" />
                                    </div>
                                </ul>
                                <x-boton_menu title="" class="btn-admin bg-gradient-marron p-0 me-sm-2 me-md-3"
                                    nombre="de" />
                                <x-boton_menu title=""
                                    class="btn-admin bg-gradient-marron-oscuro p-0 me-sm-2 me-md-3"
                                    nombre="{{ $lastPage }}" wire:click="paginar('{{ $lastPageUrl }}')" />
                            </div>
                            <div class="row justify-content-center mb-3">
                                <x-boton_menu wire:click="paginar('{{ $prevPage }}')" title="Anterior"
                                    class="btn-admin bg-gradient-marron-claro p-0 col-12 me-sm-2 me-md-3"
                                    nombreIcono="fa fa-angle-left" />
                                <select class="btn btn-admin bg-gradient-marron-oscuro p-0 ms-2 me-2 mb-0 w-auto"
                                    wire:model.defer="page" wire:change="cambiarPag()">
                                    <option value="5" selected>Pag.5</option>
                                    <option value="10">Pag.10</option>
                                    <option value="15">Pag.15</option>
                                    <option value="20">Pag.20</option>
                                    <option value="25">Pag.25</option>
                                    <option value="50">Pag.50</option>
                                    <option value="100">Pag.100</option>
                                </select>
                                <x-boton_menu wire:click="paginar('{{ $nextPage }}')" title="Siguiente"
                                    class="btn-admin bg-gradient-marron-claro p-0 col-12"
                                    nombreIcono="fa fa-angle-right" />
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>
