<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class VendaComponent extends Component
{
    public $vetProd = [];
    public $percdesconto = 0;
    public $percadicional = 0;
    public $desconto = 0;
    public $adicional = 0;
    public $venda;

    protected $listeners = ['adicionarProdutoVenda', 'calcularOutros'];

    public function mount($venda = null){
        if ($venda) {
            foreach($venda as $produto){

                $this->vetProd[] = [
                    'produto_id' => $produto->produtoid,
                    'descricao' => $produto->produto->descricao,
                    'preco' => $produto->preco,
                    'quantidade' => $produto->quantidade
                ];
            }
        }
    }

    public function adicionarProdutoVenda($produtoId, $quantidade, $tabelapreco)
    {
        $produto = Produto::find($produtoId);

        $preco = 0.0;

        // Verifica se o produto já foi adicionado
        foreach ($this->vetProd as $i => $item) {
            if ($item['produto_id'] === $produtoId) {
                $this->vetProd[$i]['quantidade'] += $quantidade;
                return;
            }
        }

        if($tabelapreco == 'AV'){
            $preco = $produto->precoavista;
        } 
        elseif($tabelapreco == 'AP'){
            $preco = $produto->precoaprazo;
        }

        // Adiciona um novo produto à lista
        $this->vetProd[] = [
            'produto_id' => $produto->id,
            'descricao' => $produto->descricao,
            'preco' => $preco,
            'quantidade' => $quantidade
        ];

        $this->dispatch('close')->to('modal-component');
    }

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
            return ($produto['preco'] * $produto['quantidade']);});
        $this->desconto = $calculo * $this->percdesconto / 100;
        $this->adicional = $calculo * $this->percadicional / 100;
    }

    // Função auxiliar para calcular o total da venda
    private function calcularTotal()
    {
        // Calcula o total dos produtos sem aplicar desconto/adicional individualmente
        $totalProdutos = collect($this->vetProd)->sum(function ($produto) {
            return ($produto['preco'] * $produto['quantidade']);
        });
    
        // Aplica o desconto e adicional ao total geral dos produtos
        return $totalProdutos - $this->desconto + $this->adicional;
    }


    public function render()
    {
        return view('livewire.venda-component', [
            'produtosVenda' => $this->vetProd,
        ]);
    }
}
