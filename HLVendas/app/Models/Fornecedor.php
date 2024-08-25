<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Fornecedor extends Pessoa
{
    use HasFactory;

    protected $fillable = [
        'idpessoa',
        'ultimavenda',
        'totalvendido'
    ];

    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'idpessoa', 'id');
    }
}
