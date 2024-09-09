<?php

namespace App\Livewire;

use Livewire\Component;
use APP\Models\User;

class VerificaEmail extends Component
{

    public $email = '';

    public function render()
    {
        return view('livewire.verifica-email',[
            'user' => User::where('email', $this->email)->where('is_active', true)->first(),
            'indisponivel' => User::where('email', $this->email)->where('is_active', false)->first(),
        ]);
    }

    
}
