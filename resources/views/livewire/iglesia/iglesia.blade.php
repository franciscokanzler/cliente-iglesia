<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <livewire:data-table :columnas="$columnas" :componente="$componente" />
        </div>
    </div>
    <livewire:iglesia.crear-iglesia />
    <livewire:iglesia.editar-iglesia />
    <livewire:iglesia.consultar-iglesia />
</div>
