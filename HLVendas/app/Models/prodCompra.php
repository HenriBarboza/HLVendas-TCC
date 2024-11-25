<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCompra extends Model
{
    use HasFactory;

    protected $fillable = ['produtoid', 'compraid', 'quantidade', 'custo'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, foreignKey: 'produtoid');
    }
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compraid');
    }
    public static function produtoTemCompra($produtoId)
    {
        return self::where('produtoid', $produtoId)->exists();
    }
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionarioid');
    }
}
