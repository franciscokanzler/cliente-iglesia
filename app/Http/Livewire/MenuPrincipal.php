<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuPrincipal extends Component
{
    public function opcion($numero)
    {
        $this->emit('menu',$numero);
    }

    public function render()
    {
        return view('livewire.menu-principal');
    }
}
