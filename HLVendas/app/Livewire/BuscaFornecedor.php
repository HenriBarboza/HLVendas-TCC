<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pessoa;
use Livewire\WithPagination;

class BuscaFornecedor extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;

    public function render()
    {
        return view('livewire.busca-fornecedor', [
            'pessoas' => Pessoa::where('nome', 'like', '%' . $this->busca . '%')->with('fornecedor')->paginate(10),                  
        ]);
    }
}
