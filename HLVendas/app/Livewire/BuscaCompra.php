<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Compra;
use Livewire\WithPagination;

class BuscaCompra extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;


    public function render()
    {
        return view('livewire.busca-compra', [
            'compras' => Compra::whereHas('fornecedor', function ($query) {
                $query->where('nome', 'like', '%' . $this->busca . '%');
            })->orWhereHas('funcionario', function ($query) {
                $query->where('nome', 'like', '%' . $this->busca . '%');
            })->paginate(10),
        ]);
    }
}
