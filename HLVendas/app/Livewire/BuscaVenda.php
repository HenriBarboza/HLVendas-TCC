<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venda;
use Livewire\WithPagination;

class BuscaVenda extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;
    public function render()
    {
        return view('livewire.busca-venda', [
            'vendas' => Venda::whereHas('cliente', function ($query) {
                $query->where('nome', 'like', '%' . $this->busca . '%');
            })->orWhereHas('funcionario', function ($query) {
                $query->where('nome', 'like', '%' . $this->busca . '%');
            })->get(),
        ]);
    }
}
