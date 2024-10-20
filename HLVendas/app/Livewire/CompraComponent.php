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
    public $compra;

    protected $listeners = ['adicionarProdutoCompra', 'calcularOutros'];

    public function mount($compra = null)
    {
        if ($compra) {
            foreach($compra as $produto){

                $this->vetProd[] = [
                    'produto_id' => $produto->produtoid,
                    'descricao' => $produto->produto->descricao,
                    'custo' => $produto->custo,
                    'quantidade' => $produto->quantidade
                ];
            }
        }
    }


    // Função para adicionar o produto à lista
    public function adicionarProdutoCompra($produtoId, $quantidade, $custo)
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
        // Calcula o total dos produtos sem aplicar desconto/adicional individualmente
        $totalProdutos = collect($this->vetProd)->sum(function ($produto) {
            return ($produto['custo'] * $produto['quantidade']);
        });
    
        // Aplica o desconto e adicional ao total geral dos produtos
        return $totalProdutos - $this->desconto + $this->adicional;
    }

    public function render()
    {
        return view('livewire.compra-component', [
            'produtosVenda' => $this->vetProd,
        ]);
    }
}
