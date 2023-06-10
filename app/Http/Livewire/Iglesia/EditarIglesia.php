<?php

namespace App\Http\Livewire\Iglesia;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class EditarIglesia extends Component
{
    public $idIglesia, $nombre, $correo, $fecha;

    protected $listeners = ['EditarIglesia' => 'editar',];

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

    public function editar($id){
        $response = Http::withToken(session('token'))
                        ->get('http://127.0.0.1:8000/api/iglesias/'.$id.'/edit');
        if ($response->ok()) {
            $result = json_decode((string)$response->getBody(), true);
            //dd($result['data'][0]);
            $this->idIglesia = $id;
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

    public function update(){
        $this->validate();

        try {
            if ($this->fecha == "") {
                $response = Http::withToken(session('token'))
                            ->accept('application/json')
                            ->put('http://127.0.0.1:8000/api/iglesias/'.$this->idIglesia,[
                                'nombre' => $this->nombre,
                                'correo' => $this->correo,
                            ]);
            }else{
                $response = Http::withToken(session('token'))
                            ->accept('application/json')
                            ->put('http://127.0.0.1:8000/api/iglesias/'.$this->idIglesia,[
                                'nombre' => $this->nombre,
                                'correo' => $this->correo,
                                'fecha_creacion' => $this->fecha,
                            ]);
            }

            if ($response->successful()) {
                $this->reset(['nombre','correo','fecha']);
                $this->dispatchBrowserEvent('closeModal');
                $this->emit('render');
            } else {
                $result = json_decode((string)$response->getBody(), true);
                dd("Error",session('token'),$this->idIglesia,$result,$response);
                //TODO:aqui va un mensaje de error
            }
        } catch (\Exception $e) {
            dd($e);
            //TODO:aqui va un mensaje de error
        }
    }

    public function borrar(){
        $this->dispatchBrowserEvent('closeModal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.iglesia.editar-iglesia');
    }
}
