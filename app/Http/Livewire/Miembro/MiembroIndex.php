<?php

namespace App\Http\Livewire\Miembro;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MiembroIndex extends Component
{
    public $token;
    protected $listeners = ['render-miembro'];

    public function mount()
    {
        $this->token = session('token');
    }

    public function render()
    {
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/miembros');

        $miembros = $data['miembros'];
        return view('livewire.miembro.miembro-index', compact('miembros'));
    }
}
