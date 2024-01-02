<div class="fixed-plugin {{ $menu }}">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" wire:click="rightMenu()">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-end">
                <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-start mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button" wire:click="rightMenu()">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <li class="nav-item pb-3">
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
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 me-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed"
                    onclick="navbarFixed(this)">
            </div>
        </div>
    </div>
</div>
