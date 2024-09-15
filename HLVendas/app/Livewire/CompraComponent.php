<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class CompraComponent extends Component
{
    public $vetProd = [];

    protected $listeners = ['adicionarProduto'];

    // Função para adicionar o produto à lista
    public function adicionarProduto($produtoId, $quantidade)
    {
        $produto = Produto::find($produtoId);

        // Verifica se o produto já foi adicionado
        foreach ($this->vetProd as $i => $item) {
            if ($item['produto_id'] === $produtoId) {
                $this->vetProd[$i]['quantidade'] += $quantidade;
                return;
            }
        }

        // Adiciona um novo produto à lista
        $this->vetProd[] = [
            'produto_id' => $produto->id,
            'descricao' => $produto->descricao,
            'desconto' => 0,
            'preco' => $produto->precoavista, // ou outro campo de preço que deseja usar
            'quantidade' => $quantidade
        ];

        $this->dispatch('close')->to('modal-component');
    }

    // Função para remover um produto da lista
    public function removerProduto($index)
    {
        unset($this->vetProd[$index]);
        $this->vetProd = array_values($this->vetProd); // Reindexa o array
    }

    // Função para salvar a venda no banco de dados
    public function salvarVenda()
    {
        
    }

    // Função auxiliar para calcular o total da venda
    private function calcularTotal()
    {
        return collect($this->vetProd)->sum(function ($produto) {
            return $produto['preco'] * $produto['quantidade'];
        });
    }

    public function render()
    {
        return view('livewire.compra-component', [
            'produtosVenda' => $this->vetProd,
        ]);
    }
}
