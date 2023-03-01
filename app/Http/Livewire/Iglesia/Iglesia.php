<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Iglesia extends Component
{
    public function render()
    {
        $data = Http::withToken('20|cwn3s2yIcrRsIrKgDp8AdafokFGGoVkdguRiSaSI')
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/iglesias');
        $iglesias = $data['data'];
        return view('livewire.iglesia.iglesia', compact('iglesias'));
    }
}
