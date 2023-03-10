<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Iglesia extends Component
{
    protected $listeners = ['render'];

    public function eliminar($id){
        $data = Http::withToken('1|D73Uymrcmup0YAmB8sUfWrOZX6IPTXC4cNg3Pgj9')
                        ->accept('application/json')
                        ->delete('http://127.0.0.1:8000/api/iglesias/'.$id);
        session()->flash('message','iglesia '.$data.' eliminada');
    }

    public function render()
    {
        $data = Http::withToken('1|D73Uymrcmup0YAmB8sUfWrOZX6IPTXC4cNg3Pgj9')
                        ->accept('application/json')
                        ->get('http://127.0.0.1:8000/api/iglesias');
        $iglesias = $data['data'];
        return view('livewire.iglesia.iglesia', compact('iglesias'));
    }
}
