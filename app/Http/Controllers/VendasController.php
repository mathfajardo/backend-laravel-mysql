<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendasResources;
use App\Models\Vendas;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendasController extends Controller
{
    use HttpResponses;
    
    public function index(Request $request) {
        // return VendasResources::collection(Vendas::all());
        return (new Vendas())->filter($request);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "produto_id" => "nullable",
            "cliente_id" => "nullable",
            "quantidade" => "required",
            "valor_total" => "required"
        ]);

        if ($validator->fails()) {
            return $this->error('erro ao adicionar', 422, $validator->errors());
        }

        $created = Vendas::create($validator->validate());

        if ($created) {
            return $this->response('Venda registrada', 200, $created);
        }
        return $this->response('Venda não foi registrada', 400);
        
        
    }

    public function destroy(Vendas $venda) {
        $deleted = $venda->delete();

        if ($deleted) {
            return $this->response("Venda deletada com sucesso", 200);
        }

        return $this->response("Não foi possível deletar", 400);
    }
}
