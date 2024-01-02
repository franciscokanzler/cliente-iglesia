<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Iglesia extends Component
{
    use LivewireAlert;

    public $componente = [
        'ruta' => 'iglesias',
        'nombre' => 'Iglesia',
    ];
    public $columnas = [
        'id' => [
            'nombre' => 'id',
            'tabla' => 'iglesias',
            'columna' => 'id',
            'orden' => 'desc',
            'estado' => true,
        ],
        'nombre' => [
            'columna' => 'nombre',
            'tabla' => 'iglesias',
            'nombre' => 'nombre',
            'orden' => 'asc',
            'estado' => false,
        ],
        'correo' => [
            'columna' => 'correo',
            'tabla' => 'iglesias',
            'nombre' => 'correo',
            'orden' => 'asc',
            'estado' => false,
        ],
        'fecha_creacion' => [
            'columna' => 'fecha_creacion',
            'tabla' => 'iglesias',
            'nombre' => 'fecha inauguración',
            'orden' => 'asc',
            'estado' => false,
        ],
    ];
    public function render()
    {
        return view('livewire.iglesia.iglesia');
    }
}
