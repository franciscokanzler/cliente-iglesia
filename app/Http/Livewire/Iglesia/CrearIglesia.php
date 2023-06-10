<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Queue\Listener;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CrearIglesia extends Component
{
    public $nombre, $correo, $fecha;

    protected $listeners = ['limpiarCrearIglesia'];

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

    public function limpiarCrearIglesia(){
        $this->reset(['nombre','correo','fecha']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function guardar(){
        $this->validate();

        $data = Http::withToken(session('token'))
                        ->accept('application/json')
                        ->post('http://127.0.0.1:8000/api/iglesias',[
                            'nombre' => $this->nombre,
                            'correo' => $this->correo,
                            'fecha_creacion' => $this->fecha,
                        ]);
        //dd($data);
        $this->reset(['nombre','correo','fecha']);
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('render');
    }

    public function borrar(){
        $this->dispatchBrowserEvent('closeModal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render(){
        return view('livewire.iglesia.crear-iglesia');
    }
}
