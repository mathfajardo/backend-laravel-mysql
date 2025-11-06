<?php

namespace App\Filters;

class ClientesFilter extends Filter {
    protected array $allowedOperatorsFields = [
        'nome_cliente' => ['eq', 'ne'],
        'data_nascimento' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'ativo' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne']
    ];
}