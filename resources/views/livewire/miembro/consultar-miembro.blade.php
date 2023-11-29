<div>
    <div wire:ignore.self class="modal fade" id="modalConsultarMiembro" tabindex="-1" role="dialog"
        aria-labelledby="modal-ConsultarMiembro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-marron text-gradient">Consultar Miembro</h3>
                        </div>
                        <div class="card-body">
                            @if ($this->data != "")
                                <x-miembro_form/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
