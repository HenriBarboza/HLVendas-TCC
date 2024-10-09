<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'toatal',
        'funcionarioid',
    ];

    public function compra()
    {
        return $this->hasMany(Compra::class, 'contaid', 'id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionarioid');
    }
}
