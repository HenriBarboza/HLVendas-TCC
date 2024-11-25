<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Funcionario;
use Livewire\WithPagination;

class BuscaFuncionarios extends Component
{

    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;

    public function render()
    {
        return view('livewire.busca-funcionario',[
            'funcionarios' => Funcionario::where('nome', 'like', '%' . $this->busca . '%')->get(),
        ]);
    }
}
