<div>
    @if (session()->has('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text">{{ session('message') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
</div>
