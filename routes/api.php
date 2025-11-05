<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// rota para exibir os produtos
Route::get('/produtos', [ProdutosController::class, 'index']);

// rota para post
Route::post('/produtos', [ProdutosController::class, 'store']);




