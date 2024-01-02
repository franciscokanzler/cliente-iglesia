<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MiembroIndex extends Component
{
    use LivewireAlert;

    public $componente = [
        'ruta' => 'miembros',
        'nombre' => 'Miembro',
    ];
    public $columnas = [
        'id' => [
            'nombre' => 'id',
            'tabla' => 'miembros',
            'columna' => 'id',
            'orden' => 'desc',
            'estado' => true,
        ],
        'nombre' => [
            'columna' => 'nombre',
            'tabla' => 'miembros',
            'nombre' => 'nombre',
            'orden' => 'asc',
            'estado' => false,
        ],
        'apellido' => [
            'columna' => 'apellido',
            'tabla' => 'miembros',
            'nombre' => 'apellido',
            'orden' => 'asc',
            'estado' => false,
        ],
        'fecha_nacimiento' => [
            'columna' => 'fecha_nacimiento',
            'tabla' => 'miembros',
            'nombre' => 'fecha de nacimiento',
            'orden' => 'asc',
            'estado' => false,
        ],
        'ci' => [
            'columna' => 'ci',
            'tabla' => 'miembros',
            'nombre' => 'cédula de identidad',
            'orden' => 'asc',
            'estado' => false,
        ],
        'edad' => [
            'columna' => 'edad',
            'tabla' => 'miembros',
            'nombre' => 'edad',
            'orden' => 'asc',
            'estado' => false,
        ],
        'nombre_iglesia' => [
            'nombre' => 'iglesia',
            'tabla' => 'iglesias',
            'columna' => 'nombre',
            'orden' => 'asc',
            'estado' => false,
        ],
    ];

    public function render()
    {
        return view('livewire.miembro.miembro-index');
    }
}
