<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class CompraComponent extends Component
{
    public $vetProd = [];
    public $produto_id;
    public $quantidades = [];
    public $busca;


    public function render()
    {
        return view('livewire.compra-component', [
            'produtosCompra' => Produto::where('descricao', 'like', '%'. $this->busca. '%')->get(),
        ]);
    }

    public function addProduto($produtoId){
        $produto = Produto::find($produtoId);

        $quantidade = isset($this->quantidades[$produtoId]) ? $this->quantidades[$produtoId] : 1;

        foreach($this->vetProd as $i => $item){
            if($item['produto_id'] === $produtoId){
                $this->vetProd[$i]['quantidade'] += $quantidade;
                return;
            }
        }

        $this->vetProd[] = [
            'produto_id' => $produto->id,
            'descricao' => $produto->descricao,
            'preco_av' => $produto->precoav,
            'preco_ap' => $produto->precoap,
            'quantidade' => $quantidade,
        ];

        $this->busca = '';
        $this->quantidades[$produtoId] = 1;
    }
     
    public function removerProduto($index){
        unset($this->vetProd[$index]);
        $this->vetProd = array_values($this->vetProd);
    }

    public function salvarVenda(){

    }

    public function calcularTotal(){
        return collect($this->vetProd)->sum(function ($produto){
            return $produto['preco'] * $produto['quantidade'];
        });
    }
}
