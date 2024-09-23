<?php

namespace App\Livewire;

use App\Models\Fornecedor;
use Livewire\Component;
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
            'fornecedores' => Fornecedor::where('nome', 'like', '%' . $this->busca . '%')->paginate(10),                  
        ]);
    }
}
