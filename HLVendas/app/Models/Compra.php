<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'fornecedorid',
        'doc',
        'contaid',
        'percdesconto',
        'percadicional',
        'datacompra',
        'totalcompra',
        'funcionarioid'
    ];

    public function prodCompras()
    {
        return $this->hasMany(ProdCompra::class, 'compraid', 'doc');
    }
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionarioid');
    }
    public function conta()
    {
        return $this->belongsTo(Conta::class, 'contaid');
    }
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedorid');
    }
}
