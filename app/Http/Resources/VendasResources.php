<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendasResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'produto_id' => $this->produto_id,
            'cliente_id' => $this->cliente_id,
            'quantidade' => $this->quantidade,
            'valor_total' => $this->valor_total,
            'created_at' => $this->created_at,
            'produto' => [
                'nome_produto' => $this->produto->nome_produto,
                'categoria' => $this->produto->categoria,
                'valor_produto' => $this->produto->valor_produto
            ],
            'cliente' => [
                'nome_cliente' => $this->cliente->nome_cliente,
                'data_nascimento' => $this->cliente->data_nascimento,
                'ativo' => $this->cliente->ativo
            ]
        ];
    }
}
