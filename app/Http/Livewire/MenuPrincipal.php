<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MenuPrincipal extends Component
{
    public $fijo;

    public function opcion($numero)
    {
        $this->emit('menu', $numero);
    }

    public function logout()
    {
        $token = session('token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(config('app.api_url') . 'logout');
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
