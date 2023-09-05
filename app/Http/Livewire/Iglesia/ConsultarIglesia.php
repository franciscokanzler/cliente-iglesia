<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ConsultarIglesia extends Component
{
    public $nombre, $correo, $fecha;

    protected $listeners = ['ConsultarIglesia' => 'consultar',];

    public function consultar($id){
        $response = Http::withToken(session('token'))
                        ->get('http://127.0.0.1:8000/api/iglesias/'.$id.'/edit');
        if ($response->ok()) {
            $result = json_decode((string)$response->getBody(), true);
            //dd($result['data'][0]);
            $this->nombre = $result['data'][0]['nombre'];
            $this->correo = $result['data'][0]['correo'];
            if ($result['data'][0]['fecha_creacion']==null) {
                $this->fecha = "";
            }else{
                $this->fecha = $result['data'][0]['fecha_creacion'];
            }
        }else{
            dd("Error");
            //TODO:aqui va un mensaje de error
        }
    }

    public function salir(){
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        $nombre = $this->nombre;
        return view('livewire.iglesia.consultar-iglesia', compact('nombre'));
    }
}
