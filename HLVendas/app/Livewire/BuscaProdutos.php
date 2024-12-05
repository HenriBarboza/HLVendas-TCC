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
    public $produtosIdsAdicionados = [];
    public $custos = [];
    public function render()
    {
        return view('livewire.busca-produtos', [
            'produtos' => Produto::where('descricao', 'like', '%' . $this->busca .'%')->get(),
            'busca' => $this->busca,
        ]);
    }

    public function addProdutoCompra($produtoId)
    {
        $this->dispatch('adicionarProdutoCompra', $produtoId);
        
        $this->busca = '';
        $this->dispatch('limparBusca');
    }

    public function verificar()
    {
        dd( $this->dispatch('atualizarProdutosIdsAdicionados'));
    }

    public function addProdutoVenda($produtoId)
    {
        $this->dispatch('adicionarProdutoVenda', $produtoId);
        
        $this->busca = '';
        $this->dispatch('limparBusca');
        $this->quantidades[$produtoId] = 1;
    }

}
