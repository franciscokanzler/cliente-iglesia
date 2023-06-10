<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Danger!</strong> {{ session('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-4">
                            <h6>Iglesias</h6>
                        </div>
                        <div class="col-8 text-end pb-3 px-lg-4">
                            <x-boton_menu wire:click="$emit('limpiarCrearIglesia')" title="Home" class="btn-admin bg-gradient-marron-oscuro p-0 mx-lg-4" nombreIcono="fa-solid fa-plus" data-bs-toggle="modal"
                            data-bs-target="#modalCrearIglesia"/>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        nombre
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        correo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        fecha inauguración
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                        opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iglesias as $iglesia)
                                    <tr class="pb-2">
                                        <td>
                                            {{$iglesia['id']}}
                                        </td>
                                        <td>
                                            {{$iglesia['nombre']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$iglesia['correo']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$iglesia['fecha_creacion']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <x-boton_menu wire:click="" title="Home" class="btn-admin bg-gradient-marron-claro p-0" nombreIcono="fa-solid fa-magnifying-glass"/>
                                            <x-boton_menu wire:click="$emit('EditarIglesia', {{$iglesia['id']}})" title="Home" class="btn-admin bg-gradient-marron p-0" nombreIcono="fa-solid fa-pen" data-bs-toggle="modal"
                                            data-bs-target="#modalEditarIglesia"/>
                                            <x-boton_menu wire:click="eliminar({{$iglesia['id']}})" title="Home" class="btn-admin bg-gradient-marron-oscuro p-0" nombreIcono="fa-solid fa-trash"/>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:iglesia.crear-iglesia>
    <livewire:iglesia.editar-iglesia>
</div>
