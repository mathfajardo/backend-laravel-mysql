<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto', 
        'categoria', 
        'valor_produto'
    ];

    public function vendas()
    {
        return $this->hasMany(Vendas::class, 'produto_id');
    }
}
