<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;
    public $errorMessage;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    /* public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
        $this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
    } */

    public function login()
    {
        $response = Http::post('http://127.0.0.1:8000/api/usuarios/login', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($response->ok()) {
            $token = $response['token'];
            session(['token' => $token]);
            return redirect('/dashboard');
        } else {
            $this->errorMessage = 'Credenciales inválidas.';
        }
    }

    public function closeAlert()
    {
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.base');
    }
}
