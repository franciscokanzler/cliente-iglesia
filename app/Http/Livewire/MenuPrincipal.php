<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MenuPrincipal extends Component
{
    public function opcion($numero)
    {
        $this->emit('menu',$numero);
    }

    public function logout()
    {
        $token = session('token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://127.0.0.1:8000/api/logout');
        if ($response->successful()) {
            session()->forget('token');
            return redirect('/login');
        }
    }

    public function render()
    {
        return view('livewire.menu-principal');
    }
}
