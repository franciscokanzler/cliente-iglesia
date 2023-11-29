<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class MiembroIndex extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $token, $miembros = null;
    protected $listeners = ['render'];

    public function mount()
    {
        $this->token = session('token');
    }

    public function miembros(){
        $response = Http::withToken(session('token'))
                        ->accept('application/json')
                        ->get(config('app.api_url').'miembros/');
        if ($response->successful()) {
            //dd($response['miembros']);
            $this->miembros = $response['miembros'];
        }else{
            $this->miembros = [];
        }
    }

    public function eliminar($id){
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->delete(config('app.api_url').'miembros/'.$id);
        if ($data->successful()) {
            $this->miembros();
            $this->alert('success', 'Miembro eliminado satisfactoriamente', [
                'position' => 'center'
            ]);
            return $this->render();
            //session()->flash('message','miembro '.$data.' eliminado');
        }
    }

    public function render()
    {
        $this->miembros();
        return view('livewire.miembro.miembro-index', [
            'miembros' => $this->miembros,
        ]);
    }
}
