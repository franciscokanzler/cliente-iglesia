<div class="fixed-plugin {{ $menu }}">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" wire:click="rightMenu()">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg barraLateral">
        <div class="card-header pb-0 pt-3 ">
            <div class="row">
                <div class="col-3">
                    <span>
                        <a type="button" wire:click="rightMenu()" title="Cerrar menú">
                            <i class="fa-solid fa-close"></i>
                        </a>
                    </span>
                </div>
                <div class="col-3">
                    <span>
                        <a type="button" wire:click="$emit('navegar','anterior')" title="Anterior">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </span>
                </div>
                <div class="col-3">
                    <span>
                        <a type="button" wire:click="$emit('navegar','siguiente')" title="Siguiente">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </span>
                </div>
                <div class="col-3">
                    <span>
                        <a type="button" wire:click="logout()" title="Salir">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-3 my-3">
        <div class="card-body pt-sm-3 pt-0">
            <div class="mt-1">
                <h6 class="mb-0">Configuraciones</h6>
                <p class="text-sm ms-3">Elige tus preferencias.</p>
            </div>
            <li class="nav-item pb-3 mt-3">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#colores" aria-controls="colores"
                    role="button">
                    <x-boton_menu title="Perfil" class="btn-admin-sm" nombreIcono="fa-solid fa-palette" />
                    <span class="nav-link-text ms-1">Configurar color del sitio</span>
                </a>
                <div class="collapse" id="colores" wire:ignore.self>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <ul class="nav ms-3 mt-3">
                                <a href="javascript:void(0)" class="switch-trigger background-color">
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Paletas Predeterminadas
                                            </h6>
                                        </li>
                                    </div>
                                    <div class="badge-colors my-2 ms-4 text-right">
                                        <span
                                            class="badge filter bg-opcion-azul {{ $this->paletas['azul']['status'] == true ? 'active' : '' }}"
                                            wire:click="cambiarPaleta('azul')"></span>
                                        <span
                                            class="badge filter bg-opcion-verde {{ $this->paletas['verde']['status'] == true ? 'active' : '' }}"
                                            wire:click="cambiarPaleta('verde')"></span>
                                        <span class="badge filter bg-opcion-morado {{ $this->paletas['morado']['status'] == true ? 'active' : '' }}"
                                            wire:click="cambiarPaleta('morado')"></span>
                                        <span class="badge filter bg-opcion-red {{ $this->paletas['rojo']['status'] == true ? 'active' : '' }}"
                                            wire:click="cambiarPaleta('rojo')"></span>
                                        <span class="badge filter bg-opcion-pink {{ $this->paletas['rosado']['status'] == true ? 'active' : '' }}"
                                            wire:click="cambiarPaleta('rosado')"></span>
                                    </div>
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Personalizable
                                            </h6>
                                        </li>
                                    </div>
                                    <div class="badge-colors my-2 ms-4 text-right">
                                        <input type="color" class="input-circular" wire:change="capturarColor()" wire:model.defer="colorSeleccionado">
                                    </div>
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Modo Dark
                                            </h6>
                                        </li>
                                        <li class="list-group-item border-0 px-0 d-flex ms-4">
                                            <div class="form-check form-switch ps-0 d-flex my-auto">
                                                <input class="form-check-input mx-auto" type="checkbox"
                                                    wire:click="modoDark()" {{ $modoDark == true ? 'checked' : '' }}>
                                            </div>
                                        </li>
                                    </div>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item pb-3 mt-3">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#sombra" aria-controls="sombra"
                    role="button">
                    <x-boton_menu title="Perfil" class="btn-admin-sm" nombreIcono="fa-solid fa-paint-roller" />
                    <span class="nav-link-text ms-1">Configuración de sombras</span>
                </a>
                <div class="collapse" id="sombra" wire:ignore.self>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <ul class="nav ms-3 mt-3">
                                <a href="javascript:void(0)" class="switch-trigger background-color">
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Botones menú
                                            </h6>
                                        </li>
                                        <li class="list-group-item border-0 px-0 d-flex ms-4">
                                            <div class="form-check form-switch ps-0 d-flex my-auto">
                                                <input class="form-check-input mx-auto" type="checkbox"
                                                    wire:click="sombras('btnMenu')" {{ $sombras['btnMenu']['status'] == true ? 'checked' : '' }}>
                                            </div>
                                        </li>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="switch-trigger background-color">
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Botones tablas
                                            </h6>
                                        </li>
                                        <li class="list-group-item border-0 px-0 d-flex ms-4">
                                            <div class="form-check form-switch ps-0 d-flex my-auto">
                                                <input class="form-check-input mx-auto" type="checkbox"
                                                    wire:click="sombras('btnTabla')" {{ $sombras['btnTabla']['status'] == true ? 'checked' : '' }}>
                                            </div>
                                        </li>
                                    </div>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item pb-3 mt-3">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#menuFijo" aria-controls="menuFijo"
                    role="button">
                    <x-boton_menu title="Perfil" class="btn-admin-sm" nombreIcono="fa-solid fa-grip" />
                    <span class="nav-link-text ms-1">Configuración de menú</span>
                </a>
                <div class="collapse" id="menuFijo" wire:ignore.self>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <ul class="nav ms-3 mt-3">
                                <a href="javascript:void(0)" class="switch-trigger background-color">
                                    <div class="row ms-1">
                                        <li class="nav-item mt-2">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">
                                                Fijar menú
                                            </h6>
                                        </li>
                                        <li class="list-group-item border-0 px-0 d-flex ms-4">
                                            <div class="form-check form-switch ps-0 d-flex my-auto">
                                                <input class="form-check-input mx-auto" type="checkbox"
                                                    wire:click="alternarMenuFijo()" {{ $menuFijo == true ? 'checked' : '' }}>
                                            </div>
                                        </li>
                                    </div>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        </div>
    </div>
</div>
