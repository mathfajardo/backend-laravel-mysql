<?php

namespace App\Filters;

class ProdutosFilter extends Filter {
    protected array $allowedOperatorsFields = [
        'nome_produto' => ['eq', 'ne'],
        'categoria' => ['eq', 'ne'],
        'valor_produto' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne']
    ];
}