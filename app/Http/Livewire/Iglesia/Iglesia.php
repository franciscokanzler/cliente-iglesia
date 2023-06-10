<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Iglesia extends Component
{
    public $token;
    protected $listeners = ['render'];

    public function mount()
    {
        $this->token = session('token');
    }

    public function eliminar($id){
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->delete('http://127.0.0.1:8000/api/iglesias/'.$id);
        session()->flash('message','iglesia '.$data.' eliminada');
    }

    public function render()
    {
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/iglesias');
        $iglesias = $data['data'];
        return view('livewire.iglesia.iglesia', compact('iglesias'));
    }
}
