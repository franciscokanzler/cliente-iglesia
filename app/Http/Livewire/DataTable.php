<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DataTable extends Component
{
    use LivewireAlert;

    public $prevPage,  $currentPage, $lastPage, $lastPageUrl, $nextPage, $page;
    public $nroPage, $columnas, $data, $token, $componente, $modales, $buscar, $buscarPor;

    protected $listeners = ['updateTabla' => 'index'];

    public function mount()
    {
        $this->token = session('token');
        $this->currentPage = 1;
        $this->index();
    }

    public function index()
    {
        $params = [
            'columna' => '',
            'orden' => '',
        ];
        foreach ($this->columnas as $key => $columna) {
            if ($columna['estado']) {
                $params['columna'] = $key;
                $params['orden'] = $columna['orden'];
            }
        }
        $response = Http::withToken(session('token'))
            ->accept('application/json')
            ->get(config('app.api_url') . $this->componente['ruta'] . '?', [
                'page' => $this->currentPage,
                'columna' => $params['columna'],
                'orden' => $params['orden'],
                'nro' => $this->page,
                'filtro' => $this->buscarPor,
                'valor' => $this->buscar,
            ]);
        if ($response->successful()) {
            $this->data = $response['data']['data'];
            $this->currentPage = $response['data']['current_page'];
            $this->lastPage = $response['data']['last_page'];
            $this->lastPageUrl = $response['data']['last_page_url'];
            $this->nextPage = $response['data']['next_page_url'];
            $this->prevPage = $response['data']['prev_page_url'];
        } else {
            $this->data = [];
        }
    }

    public function actualizarNroPagina()
    {
        if (!($this->nroPage < 1) && !($this->nroPage > $this->lastPage)) {
            $this->currentPage = $this->nroPage;
            $this->nroPage = "";
            $this->index();
        } else {
            $this->nroPage = "";
            $this->alert('warning', 'Estimado usuario, debe ingresar un número entre 1 y ' . $this->lastPage, [
                'position' => 'center'
            ]);
        }
    }

    public function limpiarFiltros()
    {
        $this->buscarPor = null;
        $this->buscar = null;
        $this->index();
    }

    public function cambiarPag()
    {
        $this->currentPage = 1;
        $this->data = "";
        $this->index();
    }

    public function paginar($url)
    {
        if ($url != "") {
            $parsedUrl = parse_url($url);
            parse_str($parsedUrl['query'], $queryParameters);
        }

        if (isset($queryParameters['page'])) {
            $numeroDePagina = $queryParameters['page'];
            $this->currentPage = $numeroDePagina;
        }
        $this->index();
    }

    public function ordenar($col)
    {
        foreach ($this->columnas as $key => $columna) {
            $this->columnas[$key]['estado'] = ($key == $col);
            $this->columnas[$key]['orden'] = ($key == $col && $columna['orden'] == 'asc') ? 'desc' : 'asc';
        }
        $this->index();
    }

    public function eliminar($id)
    {
        $data = Http::withToken($this->token)
            ->accept('application/json')
            ->delete(config('app.api_url') . $this->componente['ruta'] . '/' . $id);
        if ($data->successful()) {
            $this->index();
            $this->alert('success', 'Registro eliminado satisfactoriamente', [
                'position' => 'center'
            ]);
            $this->index();
        }
    }
    public function buscar()
    {
        if ($this->buscar == null || $this->buscarPor == null) {
            $this->alert('error', 'Estimado usuario, debe ingresar un filtro y el valor a buscar', [
                'position' => 'center'
            ]);
        } else {
            $this->currentPage = 1;
            $this->index();
        }
    }

    public function render()
    {
        return view('livewire.data-table');
    }
}
