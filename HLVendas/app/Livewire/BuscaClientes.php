<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pessoa;
use App\Models\Cliente;
use Livewire\WithPagination;

class BuscaClientes extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;

    public function render()
    {  
        
        return view('livewire.busca-clientes', [
            'pessoas' => Pessoa::where('nome', 'like', '%' . $this->busca . '%')->with('cliente')->paginate(10),
        ]);
    }
}
