<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class CompraComponent extends Component
{
    public $vetProd = [];
    public $percdesconto = 0;
    public $percadicional = 0;
    public $desconto = 0;
    public $adicional = 0;


    protected $listeners = ['adicionarProduto', 'calcularOutros'];

    // Função para adicionar o produto à lista
    public function adicionarProduto($produtoId, $quantidade, $custo)
    {

        $produto = Produto::find($produtoId);

        // Verifica se o produto já foi adicionado
        foreach ($this->vetProd as $i => $item) {
            if ($item['produto_id'] === $produtoId) {
                $this->vetProd[$i]['quantidade'] += $quantidade;
                $this->vetProd[$i]['custo'] = $custo;
                return;
            }
        }

        // Adiciona um novo produto à lista
        $this->vetProd[] = [
            'produto_id' => $produto->id,
            'descricao' => $produto->descricao,
            'custo' => $custo,
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

    public function calcularOutros()
    {
        // Garantir que os valores sejam numéricos, ou definir como 0
        $this->percdesconto = is_numeric($this->percdesconto) ? $this->percdesconto : 0;
        $this->percadicional = is_numeric($this->percadicional) ? $this->percadicional : 0;

        $calculo = collect($this->vetProd)->sum(function ($produto) {
            return ($produto['custo'] * $produto['quantidade']);});
        $this->desconto = $calculo * $this->percdesconto / 100;
        $this->adicional = $calculo * $this->percadicional / 100;
    }

    // Função auxiliar para calcular o total da venda
    private function calcularTotal()
    {
        return collect($this->vetProd)->sum(function ($produto) {
            return (
                ($produto['custo'] * $produto['quantidade']) - $this->desconto + $this->adicional
            );
        });
    }

    public function render()
    {
        return view('livewire.compra-component', [
            'produtosVenda' => $this->vetProd,
        ]);
    }
}
