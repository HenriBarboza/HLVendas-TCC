<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoEstoque extends Model
{
    use HasFactory;
    protected $fillable = [
        'motivo',
        'produtoid',
        'quantidade',
        'observacao',
        'tipomovimentacao'
        ];
        public function produto()
        {
            return $this->belongsTo(Produto::class, foreignKey: 'produtoid');
        }
}
