<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ConsultarMiembro extends Component
{
    public $nombre, $apellido, $fechaNacimiento, $ci, $edad, $telefono, $correo, $nro_casa, $calle;

    public $representante, $representante_ci, $id_representante, $iglesia_id, $rango_id, $estado_civil_id, $estado_id, $municipio_id, $parroquia_id;

    public $data, $municipio, $parroquia;

    public $currentStep = 1, $opcion = "consultar";

    protected $listeners = ['limpiarModal', 'read' => 'readMiembro'];

    public function salir(){
        $this->limpiarModal();
        $datos = [
            'modal' => '#modalConsultarMiembro',
            'accion' => 'cerrar'
        ];
        $this->dispatchBrowserEvent('modal', $datos);
    }

    public function formStep($step)
    {
        $this->currentStep = $step;
    }

    public function limpiarModal(){
        $this->currentStep = 1;
        $this->reset([
            'nombre', 'apellido', 'fechaNacimiento', 'ci', 'edad', 'telefono', 'correo', 'nro_casa', 'calle',
            'representante', 'representante_ci', 'id_representante', 'iglesia_id', 'rango_id',
            'estado_civil_id', 'estado_id', 'municipio_id', 'parroquia_id', 'municipio', 'parroquia'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
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
            }else{
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
            }else{
                $this->parroquia_id = "";
                $this->parroquia = "";
            }
        } catch (\Throwable $th) {
            Log::error('Error función EditarMiembro.Parroquia: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function readMiembro($miembro){
        try {
            $this->limpiarModal();
            $miembro = Http::withToken(session('token'))
                            ->accept('application/json')
                            ->get(config('app.api_url').'miembros/'.$miembro.'/edit');

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
                            ->get(config('app.api_url').'miembros/create');

            $this->data = json_decode((string)$datosSelect->getBody(), true);
            $this->data['miembro_id'] = $miembro['id'];

            $this->Municipio($miembro['estado_id']);
            $this->Parroquia($miembro['municipio_id']);


            $this->municipio_id = $miembro['municipio_id'];
            $this->parroquia_id = $miembro['parroquia_id'];


            $datos = [
                'modal' => '#modalConsultarMiembro',
                'accion' => 'abrir'
            ];
            $this->dispatchBrowserEvent('modal', $datos);
        } catch (\Throwable $th) {
            Log::error('Error función ConsultarMiembro.readMiembro: ' . $th->getMessage());
            Log::error('Archivo: ' . $th->getFile());
            Log::error('Línea: ' . $th->getLine());
        }
    }

    public function render()
    {
        return view('livewire.miembro.consultar-miembro');
    }
}
