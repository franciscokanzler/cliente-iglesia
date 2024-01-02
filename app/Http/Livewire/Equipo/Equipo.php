<?php

namespace App\Http\Livewire\Equipo;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class Equipo extends Component
{
    use LivewireAlert;

    public $token, $currentPage, $columna, $orden, $page, $buscarPor, $buscar;

    public function mount()
    {
        $this->token = session('token');
        $this->currentPage = 1;
        $this->columna = "desc";
        $this->index();
    }

    public function index()
    {
        //dd(session('user'));
        //dd(session('user')['id']);
        /* $response = Http::withToken(session('token'))
            ->accept('application/json')
            ->get(config('app.api_url') . 'iglesias?', [
                'page' => $this->currentPage,
                'columna' => $this->columna,
                'orden' => $this->orden,
                'nro' => $this->page,
                'filtro' => $this->buscarPor,
                'valor' => $this->buscar,
                'role_id' => session('user')['role_id'],
                'miembro_id' => session('user')['miembro_id'],
                'id' => session('user')['id'],
            ]); */
    }

    public $componente = [
        'ruta' => 'equipos',
        'nombre' => 'Equipo',
    ];
    public $columnas = [
        'id' => [
            'nombre' => 'id',
            'tabla' => 'equipos',
            'columna' => 'id',
            'orden' => 'desc',
            'estado' => true,
        ],
        'nombre' => [
            'columna' => 'nombre',
            'tabla' => 'equipos',
            'nombre' => 'nombre',
            'orden' => 'asc',
            'estado' => false,
        ],
        'correo' => [
            'columna' => 'correo',
            'tabla' => 'equipos',
            'nombre' => 'correo',
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
        return view('livewire.equipo.equipo');
    }
}
