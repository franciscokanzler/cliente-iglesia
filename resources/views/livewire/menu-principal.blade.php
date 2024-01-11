<div>
    @if ($mostrar)
        <div class="row m-0 bg-menu {{ $fijo }}">
            <nav class="navbar navbar-expand-lg z-index-2 shadow-none my-2 ">
                <div class="container">
                    <div class="col-1">
                        <a class="navbar-brand  text-white " href="" rel="tooltip"
                            title="Diseñado y codificado por @FranciscoKanzler" data-placement="bottom" target="_blank">
                            Titulo App
                        </a>
                    </div>
                    <button class="col-2 col-sm-1 navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="text-white fa fa-bars"></span>
                    </button>
                    <div class="col-12 d-lg-none collapse" id="navigation">
                        {{-- <div class="row col-11 mx-auto d-flex justify-content-center m-3" >
                        <x-boton_menu wire:click="opcion(1)" title="Home" class="col-10 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-outline-light" nombreIcono="fa-solid fa-house"/>
                        <x-boton_menu wire:click="opcion(2)" title="Perfil" class="col-10 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-outline-light mt-3" nombreIcono="fa-regular fa-user"/>
                        <x-boton_menu wire:click="opcion(3)" title="Iglesia" class="col-10 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-outline-light mt-3" nombreIcono="fa-solid fa-place-of-worship"/>
                        <x-boton_menu wire:click="opcion(4)" title="Admin" class="col-10 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-outline-light mt-3" nombreIcono="fa-solid fa-list"/>
                    </div> --}}
                        <div class="row col-11 mx-auto d-flex justify-content-center m-3">
                            <div class="row col-12 mx-auto d-flex justify-content-center m-3">
                                <x-boton_menu wire:click="opcion('dashboard')" title="Home"
                                    class="col-10 col-sm-6 col-md-6 col-lg-1 col-xl-1 btn-admin mx-4 {{ $btnSombra }}"
                                    nombreIcono="fa-solid fa-house" />
                                <x-boton_menu wire:click="opcion('profile')" title="Perfil"
                                    class="col-10 col-sm-6 col-md-6 col-lg-1 col-xl-1 btn-admin mx-4 {{ $btnSombra }}"
                                    nombreIcono="fa-regular fa-user" />
                            </div>
                            <div class="row col-12 mx-auto d-flex justify-content-center m-3">
                                <x-boton_menu wire:click="opcion('tables')" title="Iglesia"
                                    class="col-10 col-sm-6 col-md-6 col-lg-1 col-xl-1 btn-admin mx-4 {{ $btnSombra }}"
                                    nombreIcono="fa-solid fa-place-of-worship" />
                                <x-boton_menu wire:click="opcion('admin')" title="Admin"
                                    class="col-10 col-sm-6 col-md-6 col-lg-1 col-xl-1 btn-admin mx-4 {{ $btnSombra }}"
                                    nombreIcono="fa-solid fa-list" />
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse col-12 col-lg-10">
                        <div class="row col-11 mx-auto d-flex justify-content-center">
                            <x-boton_menu wire:click="opcion('dashboard')" title="Home"
                                class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-admin {{ $btnSombra }}"
                                nombreIcono="fa-solid fa-house" />
                            <x-boton_menu wire:click="opcion('profile')" title="Perfil"
                                class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-admin {{ $btnSombra }}"
                                nombreIcono="fa-solid fa-user" />
                            <x-boton_menu wire:click="opcion('tables')" title="Iglesia"
                                class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-admin {{ $btnSombra }}"
                                nombreIcono="fa-solid fa-place-of-worship" />
                            <x-boton_menu wire:click="opcion('admin')" title="Admin"
                                class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1  btn-admin {{ $btnSombra }}"
                                nombreIcono="fa-solid fa-list" />
                        </div>
                        <div class="row col-11 col-sm-12 col-md-12 col-lg-1 col-xl-1 mx-auto">
                            <ul class="navbar-nav navbar-nav-hover d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-11 col-lg-1 m-auto d-flex justify-content-center">
                                        <div class="dropdown">
                                            <a class="text-white cursor-pointer" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-bell"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right px-2 py-3 ms-n4"
                                                aria-labelledby="dropdownMenuButton">
                                                ...hola
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-11 col-lg-1 m-auto d-flex justify-content-center">
                                        <div class="dropdown">
                                            <a class="text-white cursor-pointer" type="button" {{-- id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false" --}}
                                                wire:click="$emit('rightMenu')">
                                                <i class="fa fa-cog fixed-plugin-button-nav"></i>
                                            </a>
                                            {{-- <ul class="dropdown-menu dropdown-menu-right list-group px-2 py-3 ms-n4"
                                            aria-labelledby="dropdownMenuButton">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0 d-flex">
                                                    <input class="form-check-input mx-auto" type="checkbox"
                                                        id="modoDark">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="modoDark">Modo Dark</label>
                                                </div>
                                            </li>
                                        </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <livewire:components.option-panel />
    @endif
</div>
