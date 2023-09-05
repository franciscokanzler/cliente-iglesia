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
                            <h6>Miembros</h6>
                        </div>
                        <div class="col-8 text-end pb-3 px-lg-4">
                            <x-boton_menu wire:click="$emit('limpiarCrearMiembro')" title="Home" class="btn-admin bg-gradient-marron-oscuro p-0 mx-lg-4" nombreIcono="fa-solid fa-plus" data-bs-toggle="modal"
                            data-bs-target="#modalCrearMiembro"/>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        apellido
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        fecha de nacimiento
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        cédula de identidad
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                        edad
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-2">
                                        iglesia
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($miembros as $miembro)
                                    <tr class="pb-2">
                                        <td>
                                            {{$miembro['id']}}
                                        </td>
                                        <td>
                                            {{$miembro['nombre']}}
                                        </td>
                                        <td>
                                            {{$miembro['apellido']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$miembro['fecha_nacimiento']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$miembro['ci']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$miembro['edad']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{$miembro['iglesia']['nombre']}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <x-boton_menu wire:click="$emit('ConsultarMiembro', {{$miembro['id']}})" title="Ver" class="btn-admin bg-gradient-marron-claro p-0" nombreIcono="fa-solid fa-magnifying-glass" data-bs-toggle="modal"
                                            data-bs-target="#modalConsultarMiembro"/>
                                            <x-boton_menu wire:click="$emit('EditarMiembro', {{$miembro['id']}})" title="Editar" class="btn-admin bg-gradient-marron p-0" nombreIcono="fa-solid fa-pen" data-bs-toggle="modal"
                                            data-bs-target="#modalEditarMiembro"/>
                                            <x-boton_menu wire:click="eliminar({{$miembro['id']}})" title="Eliminar" class="btn-admin bg-gradient-marron-oscuro p-0" nombreIcono="fa-solid fa-trash"/>
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
    <livewire:miembro.crear-miembro>
    {{-- <livewire:miembro.editar-miembro>
    <livewire:miembro.consultar-miembro> --}}
</div>
