<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Iglesia extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        $data = Http::withToken('21|Z12VMz0Y1TB03hmx6iuokbnFUuF0wlYTqHwnfvcd')
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/iglesias');
        $iglesias = $data['data'];
        return view('livewire.iglesia.iglesia', compact('iglesias'));
    }
}
