<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConsultarIglesia extends Component
{
    use LivewireAlert;

    public $nombre, $correo, $fecha;

    protected $listeners = ['read' => 'consultar',];

    public function consultar($id)
    {
        $response = Http::withToken(session('token'))
            ->get('http://127.0.0.1:8000/api/iglesias/' . $id . '/edit');
        if ($response->ok()) {
            $result = json_decode((string)$response->getBody(), true);
            //dd($result['data'][0]);
            $this->nombre = $result['data'][0]['nombre'];
            $this->correo = $result['data'][0]['correo'];
            if ($result['data'][0]['fecha_creacion'] == null) {
                $this->fecha = "";
            } else {
                $this->fecha = $result['data'][0]['fecha_creacion'];
            }
            $datos = [
                'modal' => '#modalConsultarIglesia',
                'accion' => 'abrir'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
        } else {
            Log::error('Error función: consultar()');
            Log::error('Archivo: ConsultarIglesia');
            if (isset($response['errors'])) {
                foreach ($response['errors'] as $key => $errores) {
                    foreach ($errores as $error) {
                        Log::error($key . ' mensaje: ' . $error);
                    }
                }
            }
            $this->alert('warning', 'Estimado usuario, no se pueden consultar los datos solicitados, por favor intente más tarde.', [
                'position' => 'center'
            ]);
        }
    }

    public function salir()
    {
        $datos = [
            'modal' => '#modalConsultarIglesia',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
    }

    public function render()
    {
        $nombre = $this->nombre;
        return view('livewire.iglesia.consultar-iglesia', compact('nombre'));
    }
}
