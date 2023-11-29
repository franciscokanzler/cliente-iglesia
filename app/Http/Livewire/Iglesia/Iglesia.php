<?php

namespace App\Http\Livewire\Iglesia;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Iglesia extends Component
{
    use LivewireAlert;

    public $token;
    protected $listeners = ['render'];

    public function mount()
    {
        $this->token = session('token');
    }

    public function eliminar($id){
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->delete(config('app.api_url').'iglesias/'.$id);
        //session()->flash('message','iglesia '.$data.' eliminada');
        if ($data->successful()) {
            $this->alert('success', 'Iglesia eliminada satisfactoriamente', [
                'position' => 'center'
            ]);
            //session()->flash('message','miembro '.$data.' eliminado');
        }
    }

    public function render()
    {
        $data = Http::withToken($this->token)
                        ->accept('application/json')
                        ->get(config('app.api_url').'iglesias');
        $iglesias = $data['data'];
        return view('livewire.iglesia.iglesia', compact('iglesias'));
    }
}
