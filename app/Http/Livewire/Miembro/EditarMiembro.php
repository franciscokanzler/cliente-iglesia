<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditarMiembro extends Component
{
    use LivewireAlert;

    public $nombre, $apellido, $fechaNacimiento, $ci, $edad, $telefono, $correo, $nro_casa, $calle;

    public $representante, $representante_ci, $id_representante, $iglesia_id, $rango_id, $estado_civil_id, $estado_id, $municipio_id, $parroquia_id;

    public $data, $municipio, $parroquia;

    public $currentStep = 1, $opcion = "actualizar";

    protected $listeners = ['limpiarModal', 'update' => 'DatosMiembro'];

    public function limpiarModal()
    {
        $this->currentStep = 1;
        $this->reset([
            'nombre', 'apellido', 'fechaNacimiento', 'ci', 'edad', 'telefono', 'correo', 'nro_casa', 'calle',
            'representante', 'representante_ci', 'id_representante', 'iglesia_id', 'rango_id',
            'estado_civil_id', 'estado_id', 'municipio_id', 'parroquia_id', 'municipio', 'parroquia'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedFechaNacimiento()
    {
        if (!empty($this->fechaNacimiento)) {
            $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->fechaNacimiento);
            $this->edad = $fechaNacimiento->diffInYears(Carbon::now());
        }

        if ($this->edad < 9) {
            $this->ci = "";
            $this->estado_civil_id = "";
        }

        if ($this->edad > 17) {
            $this->representante = "";
            $this->id_representante = "";
        }
    }

    public function Municipio($estado_id)
    {
        try {
            if ($estado_id != "") {
                $response = Http::withToken(session('token'))
                    ->accept('application/json')
                    ->get(config('app.api_url') . 'municipios/' . $estado_id);
                $data = json_decode((string)$response->getBody(), true);
                $this->municipio_id = "";
                $this->parroquia_id = "";
                $this->municipio = $data['municipio'];
            } else {
                $this->municipio_id = "";
                $this->parroquia_id = "";
                $this->municipio = "";
                $this->parroquia = "";
            }
        } catch (\Throwable $th) {
            Log::error('Error función EditarMiembro.Municipio: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function Parroquia($municipio_id)
    {
        try {
            if ($municipio_id != "") {
                $response = Http::withToken(session('token'))
                    ->accept('application/json')
                    ->get(config('app.api_url') . 'parroquias/' . $municipio_id);

                $data = json_decode((string)$response->getBody(), true);
                //dd($data);
                $this->parroquia_id = "";
                $this->parroquia = $data['parroquia'];
            } else {
                $this->parroquia_id = "";
                $this->parroquia = "";
            }
        } catch (\Throwable $th) {
            Log::error('Error función EditarMiembro.Parroquia: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function buscarRepresentante()
    {
        if ($this->representante_ci != "") {
            //list($type, $representante_ci) = explode('-', Str::upper($this->representante_ci));
            $response = Http::withToken(session('token'))
                ->accept('application/json')
                ->get(config('app.api_url') . 'representante/' . $this->representante_ci);
            $response = json_decode((string)$response->getBody(), true);
            if ($response['representante'] == null) {
                $this->representante = "";
                $this->id_representante = "";
                $this->alert('warning', 'Estimado usuario, los datos ingresados no coinciden con los miembros registrados.', [
                    'position' => 'center'
                ]);
            } else if ($response['representante']['edad'] < 18) {
                $this->representante = "";
                $this->id_representante = "";
                $this->alert('warning', 'Estimado usuario, el representante debe ser mayor de edad.', [
                    'position' => 'center'
                ]);
            } else {
                $this->representante = $response['representante'];
                $this->id_representante = $response['representante']['id'];
            }
        } else {
            $this->representante = "";
            $this->id_representante = "";
            $this->alert('warning', 'Estimado usuario, debe ingresar un número de identificación.', [
                'position' => 'center'
            ]);
        }
    }

    protected $rules = [
        'nombre' => 'required|alpha',
        'apellido' => 'required|alpha',
        'fechaNacimiento' => 'required|date',
        'ci' => 'nullable|required_if:edad,>,9|regex:/^[VE]-\d{1,12}$/',
        //'edad' => 'required|numeric',
        'telefono' => 'nullable|regex:/^04\d{2}-\d{7}$/',
        'correo' => 'nullable|email',
        'nro_casa' => 'nullable|numeric',
        'id_representante' => 'nullable|numeric|required_without:ci|required_if:edad,<,18',
        'iglesia_id' => 'required|numeric',
        'rango_id' => 'nullable|numeric',
        'estado_civil_id' => 'nullable|required_if:edad,>,9|numeric',
        'estado_id' => 'required|numeric',
        'municipio_id' => 'required|numeric',
        'parroquia_id' => 'nullable|numeric',
    ];

    protected $ErrorMessages = [
        'nombre.required' => 'Estimado usuario, el nombre es requerido.',
        'nombre.alpha' => 'Estimado usuario, el campo nombre solo puede contener letras.',
        'apellido.required' => 'Estimado usuario, el apellido es requerido.',
        'apellido.alpha' => 'Estimado usuario, el campo apellido solo puede contener letras.',
        'correo.required' => 'Estimado usuario, el correo es requerido.',
        'correo.email' => 'Estimado usuario, el formato de correo ingresado es incorrecto.',
        'telefono.regex' => 'Estimado usuario, el campo Teléfono debe tener un formato válido de números (ejemplo: 0412-1234567).',
        'fechaNacimiento.required' => 'Estimado usuario, la fecha de nacimiento es requerida.',
        'fechaNacimiento.date' => 'Estimado usuario, el formato de fecha ingresado es incorrecto.',
        'ci.required_if' => 'Estimado usuario, el campo Número de identificación es requerido.',
        'ci.regex' => 'Estimado usuario, el campo cédula debe tener el formato V/E-1234567890 y no exceder los 12 caracteres.',
        'estado_civil_id.required_if' => 'Estimado usuario, el campo Estado Civil es requerido.',
        'estado_civil_id.numeric' => 'Estimado usuario, el valor del campo Estado Civil es incorrecto.',
        //'edad.numeric' => 'Estimado usuario, el campo Edad debe ser numérico.',
        'nro_casa.numeric' => 'Estimado usuario, el campo Número de casa debe ser numérico.',
        'iglesia_id.required' => 'Estimado usuario, ingrese la iglesia a la cual pertenece.',
        'iglesia_id.numeric' => 'Estimado usuario, el valor del campo Iglesia es incorrecto.',
        'id_representante.numeric' => 'Estimado usuario, el valor del campo Representante es incorrecto.',
        'id_representante.required_without' => 'Estimado usuario, seleccione un Representante.',
        'id_representante.required_if' => 'Estimado usuario, seleccione un Representante.',
        'rango_id.numeric' => 'Estimado usuario, el valor del campo Rango es incorrecto.',
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

    public function DatosMiembro($miembro)
    {
        try {
            $this->limpiarModal();
            $miembro = Http::withToken(session('token'))
                ->accept('application/json')
                ->get(config('app.api_url') . 'miembros/' . $miembro . '/edit');

            $miembro = json_decode((string)$miembro->getBody(), true);
            $miembro = $miembro['miembro'];
            //dd($miembro);
            $this->nombre = $miembro['nombre'];
            $this->apellido = $miembro['apellido'];
            $this->fechaNacimiento = $miembro['fecha_nacimiento'];
            $this->ci = $miembro['ci'];
            $this->edad = $miembro['edad'];
            $this->telefono = $miembro['telefono'];
            $this->correo = $miembro['correo'];
            $this->nro_casa = $miembro['nro_casa'];
            $this->calle = $miembro['calle'];
            if (isset($miembro['representante'])) {
                $this->representante = $miembro['representante'];
                $this->id_representante = $miembro['id_representante'];
                $this->representante_ci = $miembro['representante']['ci'];
            }
            $this->iglesia_id = $miembro['iglesia_id'];
            $this->rango_id = $miembro['rango_id'];
            $this->estado_civil_id = $miembro['estado_civil_id'];
            $this->estado_id = $miembro['estado_id'];

            $datosSelect = Http::withToken(session('token'))
                ->accept('application/json')
                ->get(config('app.api_url') . 'miembros/create');

            $this->data = json_decode((string)$datosSelect->getBody(), true);
            $this->data['miembro_id'] = $miembro['id'];

            $this->Municipio($miembro['estado_id']);
            $this->Parroquia($miembro['municipio_id']);


            $this->municipio_id = $miembro['municipio_id'];
            $this->parroquia_id = $miembro['parroquia_id'];


            $datos = [
                'modal' => '#modalEditarMiembro',
                'accion' => 'abrir'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
        } catch (\Throwable $th) {
            Log::error('Error función EditarMiembro.DatosMiembro: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function actualizar($id)
    {
        $this->validate();

        $data = Http::withToken(session('token'))
            ->accept('application/json')
            ->put(config('app.api_url') . 'miembros/' . $id, [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'fecha_nacimiento' => $this->fechaNacimiento,
                'ci' => $this->ci,
                'edad' => $this->edad,
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'nro_casa' => $this->nro_casa,
                'calle' => $this->calle,
                'id_representante' => $this->id_representante,
                'iglesia_id' => $this->iglesia_id,
                'rango_id' => $this->rango_id,
                'estado_civil_id' => $this->estado_civil_id,
                'estado_id' => $this->estado_id,
                'municipio_id' => $this->municipio_id,
                'parroquia_id' => $this->parroquia_id,
            ]);

        //$data = json_decode((string)$data->getBody(), true);
        if ($data->successful()) {
            $this->alert('success', 'Miembro actualizado satisfactoriamente', [
                'position' => 'center'
            ]);
            //$this->reset(['nombre','correo','fecha']);
            $this->emit('updateTabla');
            $datos = [
                'modal' => '#modalEditarMiembro',
                'accion' => 'cerrar'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
            $this->limpiarModal();
        } else {
            $this->alert('warning', 'Estimado usuario, no se ha podido actualizar el miembro, por favor intente más tarde.', [
                'position' => 'center'
            ]);
            //dd(json_decode((string)$data->getBody(), true));
        }
    }

    public function salir()
    {
        $this->limpiarModal();
        $datos = [
            'modal' => '#modalEditarMiembro',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
    }

    public function formStep($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.miembro.editar-miembro');
    }
}
