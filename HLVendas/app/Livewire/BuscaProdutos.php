<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithPagination;


class BuscaProdutos extends Component
{
    use WithPagination;

    public $busca = '';
    public $rota;
    public $texto;
    public function render()
    {
        return view('livewire.busca-produtos', [
            'produtos' => Produto::where('descricao', 'like', '%' . $this->busca .'%')->paginate(10),
        ]);
    }
}
