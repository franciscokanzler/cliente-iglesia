<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Body extends Component
{
    public $paginar = 'miembro.index';

    protected $listeners = ['menu'];

    public function menu($numero=Null){
        /* session()->flash('message', 'llego '.$numero); */
        $this->paginar = $numero;
    }

    public function render()
    {
        return view('livewire.body');
    }
}
