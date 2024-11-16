<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MovimentoEstoque;
use Livewire\WithPagination;

class BuscaEstoque extends Component
{
    use WithPagination;
    public $busca = '';
    public $rota;
    public $texto;
    public function render()
    {
        return view('livewire.busca-estoque', [
            'movimentos' => MovimentoEstoque::where('motivo', 'like', '%' . $this->busca . '%')
                ->orWhereHas('produto', function ($query) {
                    $query->where('descricao', 'like', '%' . $this->busca . '%');
                })
                ->paginate(10),
        ]);
    }
}
