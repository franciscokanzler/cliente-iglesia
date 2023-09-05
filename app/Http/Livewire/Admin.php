<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public function opcion($opcion)
    {
        $this->emit('menu',$opcion);
    }

    public function render()
    {
        return view('livewire.admin');
    }
}
