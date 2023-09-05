<div>
    <div wire:ignore.self class="modal fade" id="modalConsultarIglesia" tabindex="-1" role="dialog" aria-labelledby="modal-ConsultarIglesia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">Iglesia {{$nombre}}</h3>
                            <p class="mb-0">Datos Iglesia:</p>
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <label>Nombre de la iglesia</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre"
                                        aria-label="Nombre" aria-describedby="nombre-addon" readonly wire:model.defer="nombre">
                                </div>
                                <label>Correo</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Ejemplo@gmail.com"
                                        aria-label="Correo" aria-describedby="correo-addon" readonly wire:model.defer="correo">
                                </div>
                                <label>Fecha Inauguración</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" placeholder="Fecha Inauguración"
                                        aria-label="Fecha" aria-describedby="fecha-addon" readonly wire:model.defer="fecha">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center col-4 mx-auto">
                                            <button type="button" class="btn btn-admin bg-gradient-marron btn-md w-100 mt-4 mb-0" wire:click="salir()">Salir</button>
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

