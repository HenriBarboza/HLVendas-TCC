<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CondicaoPagamento;
use Livewire\WithPagination;

class BuscaCondicaoPagamento extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;

    public function render()
    {
        return view('livewire.busca-condicao-pagamento',[
            'condicoes' => CondicaoPagamento::where('descricao', 'like', '%'. $this->busca. '%')->paginate(10),
        ]);
    }
}
