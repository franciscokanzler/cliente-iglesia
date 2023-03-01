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
    @if ($paginar == 1)
        <livewire:dashboard>
    @elseif ($paginar == 2)
        <livewire:profile>
    @elseif ($paginar == 3)
        <livewire:tables>
    @elseif ($paginar == 4)
        <livewire:admin>
    @elseif ($paginar == 5)
        <livewire:iglesia.iglesia>
    @endif
</div>
