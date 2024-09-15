<?php

namespace App\Livewire;

use Livewire\Component;

class ModalComponent extends Component
{
    public $isOpen = false;
    public $rota;

    protected $listeners = ['open','close'];

    public function render()
    {
        return view('livewire.modal-component');
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
