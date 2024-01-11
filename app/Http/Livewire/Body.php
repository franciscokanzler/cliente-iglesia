<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Body extends Component
{
    use LivewireAlert;

    public $paginar = 'equipo', $mostrar, $indexActual;
    public $navegar = [];
    //public $paginar = 'equipo';

    protected $listeners = ['menu', 'mostrar', 'navegar'];

    public function mount()
    {
        $this->mostrar = false;
        $this->navegar[] = 'equipo';
        $this->indexActual = 0;
    }

    public function menu($opcion = Null)
    {
        if (count($this->navegar) > 1) {
            if ($this->indexActual < count($this->navegar) && $opcion != $this->navegar[$this->indexActual]) {
                $this->navegar = array_slice($this->navegar, 0, $this->indexActual + 1);
            }
        }

        // Añade la nueva opción al array de navegación
        if (end($this->navegar) != $opcion) {
            $this->navegar[] = $opcion;
            $this->indexActual = count($this->navegar) - 1;
        }

        /* $this->dispatchBrowserEvent('infoConsola', '---------------------menu------------------');
        $this->dispatchBrowserEvent('infoConsola', 'index actual: ' . $this->indexActual); */

        // Actualiza la página actual
        $this->paginar = $opcion;
        foreach ($this->navegar as $key => $value) {
            //$this->dispatchBrowserEvent('infoConsola', 'index: ' . $key . ' opción: ' . $value);
        }
        //$this->dispatchBrowserEvent('infoConsola', '-------------------------------------------');
    }

    public function navegar($direccion)
    {
        //dd($this->navegar,$this->indexActual);
        /* $this->dispatchBrowserEvent('infoConsola', '--------------------navegar-----------------');
        $this->dispatchBrowserEvent('infoConsola', 'index anterior: ' . $this->indexActual); */
        if ($direccion == 'anterior' && $this->indexActual > 0) {
            $this->indexActual = $this->indexActual - 1;
            $this->paginar = $this->navegar[$this->indexActual];
        } elseif ($direccion == 'siguiente' && $this->indexActual < count($this->navegar) - 1) {
            $this->indexActual = $this->indexActual + 1;
            $this->paginar = $this->navegar[$this->indexActual];
        } else {
            $this->alert('warning', 'No hay más páginas ' . ($direccion == 'anterior' ? 'anterior' : 'siguiente'), [
                'position' => 'center'
            ]);
        }
        //$this->dispatchBrowserEvent('infoConsola', '-------------------------------------------');
    }

    public function mostrar()
    {
        $this->mostrar = true;
        $this->emit('mostrarMenu');
    }

    public function render()
    {
        return view('livewire.body');
    }
}
