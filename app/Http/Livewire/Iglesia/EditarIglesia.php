<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditarIglesia extends Component
{
    use LivewireAlert;

    public $idIglesia, $nombre, $correo, $fecha;

    protected $listeners = ['update' => 'editar',];

    protected $rules = [
        'nombre' => 'required',
        'correo' => 'required|email',
        'fecha' => 'nullable|date',
    ];

    protected $ErrorMessages = [
        'nombre.required' => 'Estimado usuario, el nombre es requerido ',
        'correo.required' => 'Estimado usuario, el correo es requerido ',
        'correo.email' => 'Estimado usuario, el formato de correo ingresado es incorrecto ',
        'fecha.date' => 'Estimado usuario, el formato de fecha ingresado es incorrecto ',
    ];

    public function messages()
    {
        return $this->ErrorMessages;
    }

    public function editar($id)
    {
        $response = Http::withToken(session('token'))
            ->get(config('app.api_url') . 'iglesias/' . $id . '/edit');
        if ($response->ok()) {
            $result = json_decode((string)$response->getBody(), true);
            //dd($result['data'][0]);
            $this->idIglesia = $id;
            $this->nombre = $result['data'][0]['nombre'];
            $this->correo = $result['data'][0]['correo'];
            if ($result['data'][0]['fecha_creacion'] == null) {
                $this->fecha = "";
            } else {
                $this->fecha = $result['data'][0]['fecha_creacion'];
            }
            $datos = [
                'modal' => '#modalEditarIglesia',
                'accion' => 'abrir'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
        } else {
            dd("Error");
            //TODO:aqui va un mensaje de error
        }
    }

    public function update()
    {
        $this->validate();

        try {
            if ($this->fecha == "") {
                $response = Http::withToken(session('token'))
                    ->accept('application/json')
                    ->put(config('app.api_url') . 'iglesias/' . $this->idIglesia, [
                        'nombre' => $this->nombre,
                        'correo' => $this->correo,
                    ]);
            } else {
                $response = Http::withToken(session('token'))
                    ->accept('application/json')
                    ->put(config('app.api_url') . 'iglesias/' . $this->idIglesia, [
                        'nombre' => $this->nombre,
                        'correo' => $this->correo,
                        'fecha_creacion' => $this->fecha,
                    ]);
            }
            if ($response->successful()) {
                $this->alert('success', 'Iglesia editada satisfactoriamente', [
                    'position' => 'center'
                ]);
                $this->reset(['nombre', 'correo', 'fecha']);
                $this->dispatchBrowserEvent('closeModal');
                $this->emit('updateTabla');
            } else {
                Log::error('Error función: guardar()');
                Log::error('Archivo: CrearIglesia');
                if (isset($response['errors'])) {
                    foreach ($response['errors'] as $key => $errores) {
                        foreach ($errores as $error) {
                            Log::error($key . ' mensaje: ' . $error);
                        }
                    }
                }
                $this->alert('warning', 'Estimado usuario, no se ha podido editar la iglesia, por favor intente más tarde.', [
                    'position' => 'center'
                ]);
            }
        } catch (\Throwable $th) {
            Log::error('Error función update: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
            $this->alert('warning', 'Estimado usuario, no se ha podido editar la iglesia, por favor intente más tarde.', [
                'position' => 'center'
            ]);
        }
    }

    public function borrar()
    {
        $datos = [
            'modal' => '#modalEditarIglesia',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.iglesia.editar-iglesia');
    }
}
