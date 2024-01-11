<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class LayoutBase extends Component
{
    public $statusDom;

    protected $listeners = ['domCargado'];

    public function mount()
    {
        $this->statusDom = false;
    }

    public function domCargado(){
        $this->statusDom = true;
    }

    public function render()
    {
        return view('livewire.layouts.layout-base');
    }
}
