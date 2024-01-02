<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Body extends Component
{
    public $paginar = 'equipo';
    //public $paginar = 'equipo';

    protected $listeners = ['menu'];

    public function menu($opcion=Null){
        /* session()->flash('message', 'llego '.$opcion); */
        $this->paginar = $opcion;
    }

    public function render()
    {
        return view('livewire.body');
    }
}
