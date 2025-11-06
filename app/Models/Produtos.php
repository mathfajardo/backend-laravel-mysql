<?php

namespace App\Models;

use App\Filters\ProdutosFilter;
use App\Http\Resources\ProdutosResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto', 
        'categoria', 
        'valor_produto'
    ];

    public function filter(Request $request) {
        $queryFilter = (new ProdutosFilter)->filter($request);

        if (empty($queryFilter)) {
            return ProdutosResource::collection(Produtos::all());
        }

        $data = Produtos::query();

        if (!empty($queryFilter['whereIn'])) {
            foreach ($queryFilter['whereIn'] as $value) {
                $data->whereIn($value[0], $value[1]);
            }
        }

        $resource = $data->where($queryFilter['where'])->get();

        return ProdutosResource::collection($resource);
    }

    public function vendas()
    {
        return $this->hasMany(Vendas::class, 'produto_id');
    }
}
