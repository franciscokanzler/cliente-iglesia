<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CrearIglesia extends Component
{
    public $nombre, $correo, $fecha;

    public function guardar(){
        $data = Http::withToken('21|Z12VMz0Y1TB03hmx6iuokbnFUuF0wlYTqHwnfvcd')
                        ->accept('application/json')
                        ->post('http://127.0.0.1:8000/api/iglesias',[
                            'nombre' => $this->nombre,
                            'correo' => $this->correo,
                            'fecha_creacion' => $this->fecha,
                        ]);
        dd($data['data']);
    }

    public function render()
    {
        return view('livewire.iglesia.crear-iglesia');
    }
}
