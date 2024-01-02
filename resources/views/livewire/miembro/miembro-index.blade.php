<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <livewire:data-table :columnas="$columnas" :componente="$componente"/>
        </div>
    </div>
    <livewire:miembro.crear-miembro/>
        <livewire:miembro.editar-miembro/>
            <livewire:miembro.consultar-miembro/>
</div>
