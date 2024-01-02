<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Log;

class CrearIglesia extends Component
{
    use LivewireAlert;

    public $nombre, $correo, $fecha;

    protected $listeners = ['limpiarModal'];

    protected $rules = [
        'nombre' => 'required|alpha',
        'correo' => 'required|email',
        'fecha' => 'nullable|date',
    ];

    protected $ErrorMessages = [
        'nombre.required' => 'Estimado usuario, el nombre es requerido ',
        'nombre.alpha' => 'El campo nombre solo puede contener letras.',
        'correo.required' => 'Estimado usuario, el correo es requerido ',
        'correo.email' => 'Estimado usuario, el formato de correo ingresado es incorrecto ',
        'fecha.date' => 'Estimado usuario, el formato de fecha ingresado es incorrecto ',
    ];

    public function messages()
    {
        return $this->ErrorMessages;
    }

    public function limpiarModal()
    {
        $this->reset(['nombre', 'correo', 'fecha']);
        $this->resetErrorBag();
        $this->resetValidation();
        $datos = [
            'modal' => '#modalCrearIglesia',
            'accion' => 'abrir'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
    }

    public function guardar()
    {
        $this->validate();

        $data = Http::withToken(session('token'))
            ->accept('application/json')
            ->post(config('app.api_url') .'iglesias', [
                'nombre' => $this->nombre,
                'correo' => $this->correo,
                'fecha_creacion' => $this->fecha,
            ]);
        //dd($data);
        if ($data->successful()) {
            $this->alert('success', 'Iglesia creada satisfactoriamente', [
                'position' => 'center'
            ]);
            $this->reset(['nombre', 'correo', 'fecha']);
            $this->emit('updateTabla');
            $datos = [
                'modal' => '#modalCrearIglesia',
                'accion' => 'cerrar'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
        } else {
            Log::error('Error función: guardar()');
            Log::error('Archivo: CrearIglesia' );
            if (isset($data['errors'])) {
                foreach ($data['errors'] as $key => $errores) {
                    foreach ($errores as $error) {
                        Log::error($key . ' mensaje: ' .$error);
                    }
                }
            }
            $this->alert('warning', 'Estimado usuario, no se ha podido registrar la nueva iglesia, por favor intente más tarde.', [
                'position' => 'center'
            ]);
        }
    }

    public function borrar()
    {
        $datos = [
            'modal' => '#modalCrearIglesia',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.iglesia.crear-iglesia');
    }
}
