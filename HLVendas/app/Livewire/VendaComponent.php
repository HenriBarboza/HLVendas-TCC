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
    public $tabelaPreco = 'AV';
    public $venda;

    protected $listeners = ['adicionarProdutoVenda', 'calcularOutros', 'tabelaPrecoAtualizada'];

    public function mount($venda = null)
    {
        if ($venda) {
            foreach ($venda as $produto) {

                $this->vetProd[] = [
                    'produto_id' => $produto->produtoid,
                    'descricao' => $produto->produto->descricao,
                    'preco' => $produto->precovenda,
                    'quantidade' => $produto->quantidade
                ];
            }
        }
    }

    public function tabelaPrecoAtualizada($tabelaPreco)
    {
        $this->tabelaPreco = $tabelaPreco;

        if ($this->vetProd) {
            foreach ($this->vetProd as $i => $item) {
                $produto = Produto::find($item['produto_id']);

                if ($this->tabelaPreco == 'AV') {
                    $this->vetProd[$i]['preco'] = $produto->precoavista;
                } elseif ($this->tabelaPreco == 'AP') {
                    $this->vetProd[$i]['preco'] = $produto->precoaprazo;
                    ;
                }

            }
        }

    }

    public function adicionarProdutoVenda($produtoId)
    {
        $produto = Produto::find($produtoId);

        $preco = 0.0;

        // Verifica se o produto já foi adicionado
        foreach ($this->vetProd as $i => $item) {
            if ($item['produto_id'] === $produtoId) {
                $this->mostrarMensagem();
                return;
            }
        }

        if ($this->tabelaPreco == 'AV') {
            $preco = $produto->precoavista;
        } elseif ($this->tabelaPreco == 'AP') {
            $preco = $produto->precoaprazo;
        }

        // Adiciona um novo produto à lista
        $this->vetProd[] = [
            'produto_id' => $produto->id,
            'descricao' => $produto->descricao,
            'preco' => $preco,
            'quantidade' => 1
        ];

        $this->dispatch('close')->to('modal-component');
    }

    public function removerProduto($index)
    {
        unset($this->vetProd[$index]);
        $this->vetProd = array_values($this->vetProd); // Reindexa o array
    }


    public function mostrarMensagem()
    {
        $this->js("mostrarMensagem()");
    }

    public function updatedVetProd($value, $key)
    {
        [$index, $field] = explode('.', $key);

        if ($field === 'quantidade') {
            // Atualiza o total diretamente usando o novo valor e o campo correspondente
            $produto = &$this->vetProd[$index]; // Referência direta ao item do array

            if ($field === 'quantidade') {
                if($value <= 0){
                    $produto['quantidade'] = 1;
                } else{
                $produto['quantidade'] = $value;
                }
            }
        }
    }

    public function calcularOutros()
    {
        // Garantir que os valores sejam numéricos, ou definir como 0
        $this->percdesconto = is_numeric($this->percdesconto) ? $this->percdesconto : 0;
        $this->percadicional = is_numeric($this->percadicional) ? $this->percadicional : 0;

        $calculo = collect($this->vetProd)->sum(function ($produto) {
            return ($produto['preco'] * $produto['quantidade']);
        });
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
