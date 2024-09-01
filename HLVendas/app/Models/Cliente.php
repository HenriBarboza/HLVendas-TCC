<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pessoa;

class Cliente extends Pessoa
{
    use HasFactory;

    protected $fillable = [
        'idpessoa',
        'ultimacompra',
        'totalgasto'
    ];


    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'idpessoa', 'id');
    }
}
