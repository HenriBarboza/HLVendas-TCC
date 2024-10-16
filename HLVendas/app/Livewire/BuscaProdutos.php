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
    public $quantidades = [];
    public $custos = [];
    public function render()
    {
        return view('livewire.busca-produtos', [
            'produtos' => Produto::where('descricao', 'like', '%' . $this->busca .'%')->paginate(5),
            'busca' => $this->busca,
        ]);
    }

    public function addProdutoCompra($produtoId)
    {
        $custo = $this->custos[$produtoId] ?? Produto::find($produtoId)->custo;
        $this->dispatch('adicionarProdutoCompra', $produtoId, $this->quantidades[$produtoId] ?? 1, $custo);
        
        $this->busca = '';
        $this->dispatch('limparBusca');
        $this->quantidades[$produtoId] = 1;
    }

    public function addProdutoVenda($produtoId, $tabelapreco)
    {
        $this->dispatch('adicionarProdutoVenda', $produtoId, $this->quantidades[$produtoId] ?? 1, $tabelapreco);
        
        $this->busca = '';
        $this->dispatch('limparBusca');
        $this->quantidades[$produtoId] = 1;
    }
}
