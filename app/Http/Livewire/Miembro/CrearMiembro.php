<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CrearMiembro extends Component
{
    public $nombre, $apellido, $fechaNacimiento, $ci, $edad, $telefono, $correo, $nro_casa, $calle;

    public $id_representante, $iglesia_id, $rango_id, $estado_civil_id, $estado_id, $municipio_id, $parroquia_id;

    public $data, $municipio, $parroquia;

    public $currentStep = 1;

    protected $listeners = ['limpiarCrearMiembro'];

    public function mount(){
        $response = Http::withToken(session('token'))
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/miembros/create');

        $this->data = json_decode((string)$response->getBody(), true);

        //dd($this->data);
    }

    public function limpiarCrearMiembro(){
        /* $this->reset(['nombre','correo','fecha']); */
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedFechaNacimiento(){
        if (!empty($this->fechaNacimiento)) {
            $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->fechaNacimiento);
            $this->edad = $fechaNacimiento->diffInYears(Carbon::now());
        }

        if($this->edad < 9){
            $this->ci = "";
            $this->estado_civil_id = "";

        }
    }

    public function Municipio($id_estado)
    {
        try {
            $response = Http::withToken(session('token'))
                            ->accept('application/json')
                            ->get(config('app.api_url') . 'municipios/' . $id_estado);

            $data = json_decode((string)$response->getBody(), true);
            $this->municipio_id = "";
            $this->parroquia_id = "";
            $this->municipio = $data['municipio'];
        } catch (\Throwable $th) {
            Log::error('Error función CrearMiembro.Municipio: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function Parroquia($id_municipio)
    {
        try {
            $response = Http::withToken(session('token'))
                            ->accept('application/json')
                            ->get(config('app.api_url') . 'parroquias/' . $id_municipio);

            $data = json_decode((string)$response->getBody(), true);
            //dd($data);
            $this->parroquia_id = "";
            $this->parroquia = $data['parroquia'];
        } catch (\Throwable $th) {
            Log::error('Error función CrearMiembro.Parroquia: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }


    protected $rules = [
        'nombre' => 'required|alpha',
        'apellido' => 'required|alpha',
        'fecha_nacimiento' => 'required|date',
        'ci' => 'nullable|regex:/^[VE]-\d{1,12}$/',
        'edad' => 'required|numeric',
        'telefono' => 'nullable|regex:/^04\d{2}-\d{7}$/',
        'correo' => 'nullable|email',
        'nro_casa' => 'nullable|numeric',
        'id_representante' => 'nullable|numeric',
        'iglesia_id' => 'required|numeric',
        'rango_id' => 'nullable|numeric',
        'estado_civil_id' => 'nullable|numeric',
        'estado_id' => 'required|numeric',
        'municipio_id' => 'required|numeric',
        'parroquia_id' => 'required|numeric',
    ];

    protected $ErrorMessages = [
        'nombre.required' => 'Estimado usuario, el nombre es requerido.',
        'nombre.alpha' => 'Estimado usuario, el campo nombre solo puede contener letras.',
        'apellido.required' => 'Estimado usuario, el apellido es requerido.',
        'apellido.alpha' => 'Estimado usuario, el campo apellido solo puede contener letras.',
        'fecha_nacimiento.date' => 'Estimado usuario, el formato de fecha ingresado es incorrecto.',
        'ci.regex' => 'Estimado usuario, el campo cédula debe tener el formato V/E-1234567890 y no exceder los 12 caracteres.',
        'edad.numeric' => 'Estimado usuario, el campo Edad debe ser numérico.',
        'telefono.regex' => 'Estimado usuario, el campo Teléfono debe tener un formato válido de números (ejemplo: 0412-1234567).',
        'correo.required' => 'Estimado usuario, el correo es requerido.',
        'correo.email' => 'Estimado usuario, el formato de correo ingresado es incorrecto.',
        'nro_casa.numeric' => 'Estimado usuario, el campo Número de casa debe ser numérico.',
        'id_representante.numeric' => 'Estimado usuario, el valor del campo Representante es incorrecto.',
        'iglesia_id.required' => 'Estimado usuario, ingrese la iglesia a la cual pertenece.',
        'iglesia_id.numeric' => 'Estimado usuario, el valor del campo Iglesia es incorrecto.',
        'rango_id.numeric' => 'Estimado usuario, el valor del campo Rango es incorrecto.',
        'estado_civil_id.numeric' => 'Estimado usuario, el valor del campo Estado Civil es incorrecto.',
        'estado_id.required' => 'Estimado usuario, ingrese el Estado en el cual reside.',
        'estado_id.numeric' => 'Estimado usuario, el valor del campo Estado es incorrecto.',
        'municipio_id.required' => 'Estimado usuario, ingrese el Municipio en el cual reside.',
        'municipio_id.numeric' => 'Estimado usuario, el valor del campo Municipio es incorrecto.',
        'parroquia_id.required' => 'Estimado usuario, ingrese la Parroquia en la cual reside.',
        'parroquia_id.numeric' => 'Estimado usuario, el valor del campo Parroquia es incorrecto.',
    ];

    public function messages()
    {
        return $this->ErrorMessages;
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

    public function firstStepSubmit()
    {
        /* $validatedData = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ]); */

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        /* $validatedData = $this->validate([
            'status' => 'required',
        ]); */

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        /* Team::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'status' => $this->status,
        ]);

        $this->successMsg = 'Team successfully created.';

        $this->clearForm(); */

        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.miembro.crear-miembro');
    }
}
