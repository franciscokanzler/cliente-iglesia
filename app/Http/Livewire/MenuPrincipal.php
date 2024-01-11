<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MenuPrincipal extends Component
{
    public $fijo, $mostrar, $btnSombra;

    protected $listeners = ['mostrarMenu', 'menuFijo','sombra_btnMenu' => 'alternarSombra'];

    public function mount()
    {
        $this->mostrar = false;
    }

    public function opcion($numero)
    {
        $this->emit('menu', $numero);
    }

    public function mostrarMenu()
    {
        $this->mostrar = true;
        $this->emit('configuracionInicial');
    }

    public function menuFijo($menuFijo = false)
    {
        if ($menuFijo) {
            $this->fijo = 'menu-fixed';
            $this->dispatchBrowserEvent('ajusteMargenBody');
        } else {
            $this->fijo = '';
            $this->dispatchBrowserEvent('ajusteMenuDos');
            $this->dispatchBrowserEvent('ajusteMargenBody');
        }
    }

    public function alternarSombra()
    {
        $this->btnSombra = ($this->btnSombra == '') ? 'sombra' : '';
    }

    public function render()
    {
        return view('livewire.menu-principal');
    }
}
