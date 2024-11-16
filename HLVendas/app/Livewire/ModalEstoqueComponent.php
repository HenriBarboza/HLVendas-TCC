<?php

namespace App\Livewire;

use Livewire\Component;

class ModalEstoqueComponent extends Component
{
    public $isOpen = false;
    public $rota;
    public $listeners = ['open','close'];
    public function render()
    {
        return view('livewire.modal-estoque-component');
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
