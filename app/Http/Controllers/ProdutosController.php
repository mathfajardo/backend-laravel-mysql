<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdutosResource;
use App\Models\Produtos;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    use HttpResponses;

    public function index(Request $request) {
        return ProdutosResource::collection(Produtos::all());
    }

    // rota para post
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'nome_produto' => 'required',
            'categoria' => 'nullable',
            'valor_produto' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->error('erro ao adicionar', 422, $validator->errors());
        }

        $created = Produtos::create($validator->validated());

        if ($created) {
            return $this->response('Produto adicionado com sucesso', 200, $created);
        }
        return $this->response('Produto não adicionado', 400);
    }
}
