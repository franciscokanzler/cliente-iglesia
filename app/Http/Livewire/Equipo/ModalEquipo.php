<?php

namespace App\Http\Livewire\Equipo;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModalEquipo extends Component
{
    use LivewireAlert;

    public $tituloModal, $accion, $equipoId;
    public $nombre, $correo, $descripcion, $iglesia_id, $data;
    public $errores = [];

    protected $listeners = ['limpiarModal' => 'createProcesar', 'read' => 'readProcesar', 'update' => 'updateProcesar'];

    public function mount()
    {
        try {
            $response = Http::withToken(session('token'))
                ->accept('application/json')
                ->get(config('app.api_url') . 'equipos/create');

            $this->data = json_decode((string)$response->getBody(), true);
            //dd($this->data);
        } catch (\Throwable $th) {
            Log::error('Error función ModalEquipo.mount: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
        //dd($this->data);
    }

    public function clearModal()
    {
        $this->reset([
            'nombre', 'correo', 'descripcion', 'iglesia_id', 'errores'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function createProcesar()
    {
        $this->accion = 'crear';
        $this->tituloModal = 'Crear Equipo';
        $this->clearModal();
        $datos = [
            'modal' => '#modalEquipo',
            'accion' => 'abrir'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
    }

    public function readProcesar($id)
    {
        $this->accion = 'ver';
        $this->tituloModal = 'Ver Equipo';
        $this->clearModal();
        $this->equipo($id);
    }

    public function updateProcesar($id)
    {
        $this->accion = 'editar';
        $this->tituloModal = 'Editar Equipo';
        $this->clearModal();
        $this->equipoId = $id;
        $this->equipo($id);
    }

    public function equipo($id)
    {
        try {
            $response = Http::withToken(session('token'))
                ->accept('application/json')
                ->get(config('app.api_url') . 'equipos/' . $id . '/edit');

            $equipo = json_decode((string)$response->getBody(), true);
            $this->nombre = $equipo['data']['nombre'];
            $this->correo = $equipo['data']['correo'];
            $this->descripcion = $equipo['data']['descripcion'];
            $this->iglesia_id = $equipo['data']['iglesia_id'];
            $datos = [
                'modal' => '#modalEquipo',
                'accion' => 'abrir'
            ];
            $this->dispatchBrowserEvent('modal', $datos);

            //dd($equipo['data'],$equipo['data']['id']);
        } catch (\Throwable $th) {
            Log::error('Error función CrearMiembro.mount: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function salir()
    {
        $datos = [
            'modal' => '#modalEquipo',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
        $this->clearModal();
    }

    protected $rules = [
        'nombre' => 'required|alpha',
        'correo' => 'nullable|email',
        'descripcion' => 'required',
        'iglesia_id' => 'required|numeric',
    ];

    protected $ErrorMessages = [
        'nombre.required' => 'Estimado usuario, el nombre es requerido. ',
        'nombre.alpha' => 'El campo nombre solo puede contener letras.',
        'correo.email' => 'Estimado usuario, el formato de correo ingresado es incorrecto. ',
        'descripcion.required' => 'Estimado usuario, la descripción es requerido. ',
        'iglesia_id.required' => 'Estimado usuario, debe seleccionar una iglesia. ',
        'iglesia_id.numeric' => 'Estimado usuario, el valor del campo Iglesia es incorrecto. ',
    ];

    public function guardar($accion)
    {
        $this->validate();

        try {
            $url = ($accion == "crear") ? 'equipos' : 'equipos/' . $this->equipoId;
            $metodoHttp = ($accion == "crear") ? 'post' : 'put';
            $data = Http::withToken(session('token'))
                ->accept('application/json')
                ->{$metodoHttp}(
                    config('app.api_url') . $url,
                    [
                        'nombre' => $this->nombre,
                        'correo' => $this->correo,
                        'descripcion' => $this->descripcion,
                        'iglesia_id' => $this->iglesia_id,
                    ]
                );
                //dd($data);
            if ($data->successful()) {
                $mensajeExito = ($accion == "crear") ? 'Equipo creado satisfactoriamente' : 'Equipo editado satisfactoriamente';

                $this->alert('success', $mensajeExito, [
                    'position' => 'center'
                ]);

                $this->clearModal();
                $this->emit('updateTabla');
                $datos = [
                    'modal' => '#modalEquipo',
                    'accion' => 'cerrar'
                ];
                $this->dispatchBrowserEvent('modal', $datos);
            } else {
                throw new \Exception('Error en la solicitud');
            }
        } catch (\Exception $exception) {
            Log::error('Error función: guardar()');
            Log::error('Archivo: ModalEquipo');

            if ($exception->getMessage() == 'Error en la solicitud' && isset($data['errors'])) {
                foreach ($data['errors'] as $key => $errores) {
                    foreach ($errores as $error) {
                        Log::error($key . ' mensaje: ' . $error);
                    }
                }
                $this->errores = $data['errors'];
            } else {
                $this->alert('warning', 'Estimado usuario, no se ha podido ' . ($accion == "crear" ? 'registrar' : 'actualizar') . ' el equipo, por favor intente más tarde.', [
                    'position' => 'center'
                ]);
            }
        }
    }

    public function messages()
    {
        return $this->ErrorMessages;
    }

    public function render()
    {
        return view('livewire.equipo.modal-equipo');
    }
}
