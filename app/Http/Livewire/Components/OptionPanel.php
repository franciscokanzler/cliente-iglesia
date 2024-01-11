<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class OptionPanel extends Component
{
    use LivewireAlert;

    public $menu, $colorActivo, $modoDark, $colorSeleccionado, $menuFijo;

    public $sombras = [
        'btnMenu' => [
            'status' => false,
        ],
        'btnTabla' => [
            'status' => false,
        ],
    ];

    public $paletas = [
        'azul' => [
            'lithg' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-blue-7), var(--color-blue-4))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-blue-7), var(--color-blue-4))',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '#344767',
                '--bg-h-color' => '#344767',
                '--bg-text-body-color' => '#67748e',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '#3a416ff2',
                '--bg-form-check-input-background' => '#3a416ff2',
                '--bg-form-check-input-after' => '#85b3ed',
            ],
            'dark' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-blue-7), var(--color-blue-8))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-blue-7), var(--color-blue-9))',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '#9fb7cf',
                '--bg-h-color' => '#344767',
                '--bg-text-body-color' => '#67748e',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '#3a416ff2',
                '--bg-form-check-input-background' => '#3a416ff2',
                '--bg-form-check-input-after' => '#85b3ed',
            ],
            'status' => true,
        ],
        'verde' => [
            'lithg' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-green-2), var(--color-green-1))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-green-4), var(--color-green-2))',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '#2ab6a2',
                '--bg-h-color' => '#2ab6a2',
                '--bg-text-body-color' => '#5fe3a0',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '#5fe3a0',
                '--bg-form-check-input-background' => '#69db9f',
                '--bg-form-check-input-after' => '#b3fc94',
            ],
            'dark' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-green-2), var(--color-green-3))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-green-2), var(--color-green-4))',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '#2ab6a2',
                '--bg-h-color' => '#2ab6a2',
                '--bg-text-body-color' => '#5fe3a0',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '#5fe3a0',
                '--bg-form-check-input-background' => '#5fe3a0',
                '--bg-form-check-input-after' => '#b3fc94',
            ],
            'status' => false,
        ],
        'morado' => [
            'lithg' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-purple-1), var(--color-purple-2))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-purple-1), var(--color-purple-3))',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '#8c2b6d',
                '--bg-h-color' => '#8c2b6d',
                '--bg-text-body-color' => '#5d3d8b',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '#5d3d8b',
                '--bg-form-check-input-background' => '#7952b3',
                '--bg-form-check-input-after' => '#cb53a5',
            ],
            'dark' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-purple-4), var(--color-purple-5))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-purple-3), var(--color-purple-1))',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '#8c2b6d',
                '--bg-h-color' => '#8c2b6d',
                '--bg-text-body-color' => '#5d3d8b',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '#5d3d8b',
                '--bg-form-check-input-background' => '#5d3d8b',
                '--bg-form-check-input-after' => '#cb53a5',
            ],
            'status' => false,
        ],
        'rojo' => [
            'lithg' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-red-1), var(--color-red-2))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-red-1), var(--color-red-2))',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '#b2183a',
                '--bg-h-color' => '#b2183a',
                '--bg-text-body-color' => '#a31f52',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '#a31f52',
                '--bg-form-check-input-background' => '#e95979',
                '--bg-form-check-input-after' => '#e1214b',
            ],
            'dark' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-red-4), var(--color-red-5))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-red-2), var(--color-red-5))',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '#b2183a',
                '--bg-h-color' => '#b2183a',
                '--bg-text-body-color' => '#a31f52',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '#a31f52',
                '--bg-form-check-input-background' => '#a31f52',
                '--bg-form-check-input-after' => '#e1214b',
            ],
            'status' => false,
        ],
        'rosado' => [
            'lithg' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-pink-4), var(--color-pink-1))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-pink-1), var(--color-pink-4))',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '#e95979',
                '--bg-h-color' => '#e95979',
                '--bg-text-body-color' => '#d06b9d',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '#d06b9d',
                '--bg-form-check-input-background' => '#fb92c4',
                '--bg-form-check-input-after' => '#e95979',
            ],
            'dark' => [
                '--bg-gradient-1' => 'linear-gradient(310deg, var(--color-pink-4), var(--color-pink-5))',
                '--bg-gradient-2' => 'linear-gradient(310deg, var(--color-pink-4), var(--color-pink-1))',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '#e95979',
                '--bg-h-color' => '#e95979',
                '--bg-text-body-color' => '#d06b9d',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '#d06b9d',
                '--bg-form-check-input-background' => '#d06b9d',
                '--bg-form-check-input-after' => '#d32e96',
            ],
            'status' => false,
        ],
        'personalizada' => [
            'lithg' => [
                '--bg-gradient-1' => '',
                '--bg-gradient-2' => '',
                '--bg-body' => '#f0f2f5',
                '--bg-card' => '#fff',
                '--bg-form-control' => '#fff',
                '--bg-form-control-color' => '#495057',
                '--bg-form-control-border' => '#d2d6da',
                '--bg-border-bottom' => '#e9ecef',
                '--bg-white' => '#fff',
                '--bg-fixed-plugin-button' => '#fff',
                '--bg-fixed-plugin-button-color' => '',
                '--bg-h-color' => '',
                '--bg-text-body-color' => '',
                '--bg-form-check-input-border' => '#e9ecef',
                '--bg-form-check-input-border-checked' => '',
                '--bg-form-check-input-background' => '',
                '--bg-form-check-input-after' => '#fff',
            ],
            'dark' => [
                '--bg-gradient-1' => '',
                '--bg-gradient-2' => '',
                '--bg-body' => '#1b1e1f',
                '--bg-card' => '#181a1b',
                '--bg-form-control' => '#181a1b',
                '--bg-form-control-color' => '#b5afa6',
                '--bg-form-control-border' => '#3c4143',
                '--bg-border-bottom' => '#232728',
                '--bg-white' => '#181a1b',
                '--bg-fixed-plugin-button' => '#181a1b',
                '--bg-fixed-plugin-button-color' => '',
                '--bg-h-color' => '',
                '--bg-text-body-color' => '',
                '--bg-form-check-input-border' => '#3c4143',
                '--bg-form-check-input-border-checked' => '',
                '--bg-form-check-input-background' => '',
                '--bg-form-check-input-after' => '#fff',
            ],
            'status' => false,
        ],
    ];

    protected $listeners = ['rightMenu', 'nuevaPaleta', 'configuracionInicial'];

    public function mount()
    {
        if (Cookie::has('user_' . session('user')['id'] . '_menu_fijo')) {
            $this->menuFijo = Cookie::get('user_' . session('user')['id'] . '_menu_fijo');
            //dd($this->menuFijo,'si');
        } else {
            $this->menuFijo = false;
            //dd($this->menuFijo,'no');
        }

        if (Cookie::has('user_' . session('user')['id'] . '_Sombras')) {
            $dataFromCookie = json_decode(Cookie::get('user_' . session('user')['id'] . '_Sombras'), true);

            // Combinar los valores de la cookie con la estructura original
            $this->sombras = $this->mergeWithDefaultStructure($dataFromCookie, $this->sombras);

            // Debug
            //dd($this->sombras, 'si');
        }

        if (Cookie::has('user_' . session('user')['id'] . '_modoDark')) {
            $this->modoDark = Cookie::get('user_' . session('user')['id'] . '_modoDark');
            //dd($this->modoDark);
        } else {
            $this->modoDark = false;
        }

        if (Cookie::has('user_' . session('user')['id'] . '_tipo_paleta')) {
            $paleta = Cookie::get('user_' . session('user')['id'] . '_tipo_paleta');
            if ($paleta != 'personalizada') {
                //dd('color',$this->modoDark, $paleta);
                $this->colorActivo = $paleta;
                //$this->cambiarPaleta($this->colorActivo);
            } else {
                if (Cookie::get('paleta_' . session('user')['id'] . '_paleta')) {
                    $this->nuevaPaleta(json_decode(Cookie::get('paleta_' . session('user')['id'] . '_paleta'), true));
                } else {
                    $this->colorActivo = 'azul';
                    //$this->cambiarPaleta($this->colorActivo);
                }
            }
        } else {
            $this->colorActivo = 'azul';
            //$this->cambiarPaleta($this->colorActivo);
        }
    }

    private function mergeWithDefaultStructure($data, $defaultStructure)
    {
        foreach ($defaultStructure as $key => $value) {
            // Verificar si la clave existe en los datos de la cookie
            if (array_key_exists($key, $data)) {
                // Si la clave existe, utilizar el valor de la cookie
                $defaultStructure[$key] = $data[$key];
            }
        }

        return $defaultStructure;
    }

    public function rightMenu()
    {
        $this->menu = $this->menu == "" ? "show" : "";
        $this->dispatchBrowserEvent('ajusteMenuDos');
    }

    public function configuracionInicial()
    {
        if ($this->menuFijo) {
            $this->fijarMenu();
        }
        foreach ($this->sombras as $key => $value) {
            if ($this->sombras[$key]['status']) {
                if ($key != 'btnTabla') {
                    $this->emit('sombra_' . $key);
                }
            }
        }

        $this->cambiarPaleta($this->colorActivo);
        //$this->dispatchBrowserEvent('sombra',$this->sombras);
        $this->dispatchBrowserEvent('ajusteMenuDos');
    }

    public function alternarMenuFijo()
    {
        $this->menuFijo = !$this->menuFijo;
        Cookie::queue('user_' . session('user')['id'] . '_menu_fijo', $this->menuFijo);
        $this->fijarMenu();
    }

    public function fijarMenu()
    {
        $this->emit('menuFijo', $this->menuFijo);
    }

    public function cambiarPaleta($color = 'azul')
    {
        //dd('modo Dark: '.$this->modoDark, $color,json_decode(Cookie::get('paleta_' . session('user')['id'] . '_paleta'), true));
        foreach ($this->paletas as $key => $value) {
            $this->paletas[$key]['status'] = ($key !== $color && ($value['status'] || !$value['status'])) ? false : true;
            /* $this->dispatchBrowserEvent('infoConsola', 'key ' . $key . ' color ' . $color);
            $this->dispatchBrowserEvent('infoConsola', $this->paletas[$key]['status']); */

            if ($key === $color && $this->paletas[$key]['status']) {
                $this->colorActivo = $key;
                $modo = (!$this->modoDark) ? 'lithg' : 'dark';
                //dd($modo, $this->paletas[$key][$modo]);
                $this->dispatchBrowserEvent('modificarPaleta', $this->paletas[$key][$modo]);
            }
        }

        /* Cache::forget('user_' . session('user')['id'] . '_tipo_paleta');
        Cache::forever('user_' . session('user')['id'] . '_tipo_paleta', $color); */
        Cookie::queue('user_' . session('user')['id'] . '_tipo_paleta', $color);

        //$this->dispatchBrowserEvent('infoConsola', '====================================================');

        //dd($this->paletas);
    }

    public function capturarColor()
    {
        $this->dispatchBrowserEvent('generarPaleta', $this->colorSeleccionado);
    }

    public function nuevaPaleta($nuevaPaleta)
    {
        $this->paletas['personalizada']['lithg']['--bg-gradient-1'] = 'linear-gradient(310deg, ' . $nuevaPaleta[3] . ', ' . $nuevaPaleta[0] . ')';
        $this->paletas['personalizada']['lithg']['--bg-gradient-2'] = 'linear-gradient(310deg, ' . $nuevaPaleta[0] . ', ' . $nuevaPaleta[3] . ')';
        $this->paletas['personalizada']['lithg']['--bg-fixed-plugin-button-color'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['lithg']['--bg-h-color'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['lithg']['--bg-text-body-color'] = $nuevaPaleta[4];
        $this->paletas['personalizada']['lithg']['--bg-form-check-input-border-checked'] = $nuevaPaleta[4];
        $this->paletas['personalizada']['lithg']['--bg-form-check-input-background'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['lithg']['--bg-form-check-input-after'] = $nuevaPaleta[1];

        $this->paletas['personalizada']['dark']['--bg-gradient-1'] = 'linear-gradient(310deg, ' . $nuevaPaleta[3] . ', ' . $nuevaPaleta[4] . ')';
        $this->paletas['personalizada']['dark']['--bg-gradient-2'] = 'linear-gradient(310deg, ' . $nuevaPaleta[3] . ', ' . $nuevaPaleta[1] . ')';
        $this->paletas['personalizada']['dark']['--bg-fixed-plugin-button-color'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['dark']['--bg-h-color'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['dark']['--bg-text-body-color'] = $nuevaPaleta[4];
        $this->paletas['personalizada']['dark']['--bg-form-check-input-border-checked'] = $nuevaPaleta[4];
        $this->paletas['personalizada']['dark']['--bg-form-check-input-background'] = $nuevaPaleta[3];
        $this->paletas['personalizada']['dark']['--bg-form-check-input-after'] = $nuevaPaleta[1];

        /* Cache::forget('paleta_' . session('user')['id'] . '_paleta');
        Cache::forever('paleta_' . session('user')['id'] . '_paleta', $nuevaPaleta); */
        Cookie::queue('paleta_' . session('user')['id'] . '_paleta', json_encode($nuevaPaleta));

        $this->cambiarPaleta('personalizada');
    }

    public function modoDark()
    {
        $this->modoDark = (!$this->modoDark);
        /* Cache::forget('user_' . session('user')['id'] . '_modoDark');
        Cache::forever('user_' . session('user')['id'] . '_modoDark', $this->modoDark); */
        Cookie::queue('user_' . session('user')['id'] . '_modoDark', $this->modoDark);
        foreach ($this->paletas as $key => $value) {
            $color = ($value['status'] == true) ? $key : $this->colorActivo;
        }
        $this->cambiarPaleta($color);
    }

    public function sombras($sombra)
    {
        $this->sombras[$sombra]['status'] = !$this->sombras[$sombra]['status'];
        //dd($this->sombras);
        Cookie::queue('user_' . session('user')['id'] . '_Sombras', json_encode($this->sombras));

        $this->emit('sombra_' . $sombra);
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
        /* foreach ($this->paletas as $key => $value) {
            $this->dispatchBrowserEvent('infoConsola', 'key ' . $key . ' color ' . $key);
            $this->dispatchBrowserEvent('infoConsola', $this->paletas[$key]['status']);
        }
        $this->dispatchBrowserEvent('infoConsola', '===================================================='); */
        return view('livewire.components.option-panel');
    }
}
