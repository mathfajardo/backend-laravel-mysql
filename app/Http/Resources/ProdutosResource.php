<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome do produto' => $this->nome_produto,
            'categoria' => $this->categoria,
            'valor do produto' => "R$" . $this->valor_produto
        ];
    }
}
