<?php

namespace App\Livewire;

use App\Models\Conta;
use Livewire\Component;
use Livewire\WithPagination;

class BuscaConta extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;
    public function render()
    {
        return view('livewire.busca-conta', [
            'contas' => Conta::where('nome', 'like', '%' . $this->busca . '%')->get(),                  
        ]);
    }
}
