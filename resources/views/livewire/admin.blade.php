<div>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row mb-4 justify-content-center mt-4">
                <x-opcion_menu_admin class="mt-xxl-2" modulo="Iglesia" dato="nombre o nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion('iglesia.index')" title="Iglesia" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-solid fa-landmark"/>
                    </x-slot>
                </x-opcion_menu_admin>
                <x-opcion_menu_admin class="mt-4 mt-sm-0 mt-md-0 mt-xxl-2" modulo="Miembros" dato="nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion('miembro.index')" title="Miembros" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-solid fa-users"/>
                    </x-slot>
                </x-opcion_menu_admin>
                <x-opcion_menu_admin class="mt-4 mt-lg-0 mt-xxl-2" modulo="Equipos" dato="nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion('equipo')" title="Equipos" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-solid fa-people-group"/>
                    </x-slot>
                </x-opcion_menu_admin>
                <x-opcion_menu_admin class="mt-4 mt-sm-4 mt-md-4 mt-lg-5 mt-xxl-6" modulo="Usuarios" dato="nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion(4)" title="Usuarios" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-regular fa-user"/>
                    </x-slot>
                </x-opcion_menu_admin>
                <x-opcion_menu_admin class="mt-4 mt-lg-5 mt-xxl-6" modulo="Administrativo" dato="nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion(4)" title="Administrativo" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-solid fa-diagram-project"/>
                    </x-slot>
                </x-opcion_menu_admin>
                <x-opcion_menu_admin class="mt-4 mt-sm-4 mt-md-4 mt-lg-5 mt-xxl-6" modulo="Reportes" dato="nro">
                    <x-slot name="boton">
                        <x-boton_menu wire:click="opcion(4)" title="Reportes" class="btn-admin bg-gradient-marron-oscuro mt-3 mb-3" nombreIcono="fa-solid fa-chart-line"/>
                    </x-slot>
                </x-opcion_menu_admin>
            </div>
        </div>
    </main>
</div>

