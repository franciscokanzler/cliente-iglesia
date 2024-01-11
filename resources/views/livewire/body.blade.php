<div>
    @if ($mostrar)
        {{-- {{$paginar}} --}}
        @if ($paginar == 'dashboard')
            <livewire:dashboard />
        @elseif ($paginar == 'profile')
            <livewire:profile />
        @elseif ($paginar == 'tables')
            <livewire:tables />
        @elseif ($paginar == 'admin')
            <livewire:admin />
        @elseif ($paginar == 'iglesia.index')
            <livewire:iglesia.iglesia />
        @elseif ($paginar == 'miembro.index')
            <livewire:miembro.miembro-index />
        @elseif ($paginar == 'equipo')
            <livewire:equipo.equipo />
        @endif
    @else
        @include('components.cargando')
    @endif
</div>
