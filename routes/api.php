<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\FormaPagamentoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    //Authenticate
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    //Auth
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Users    
    Route::post('users/signup', [UserController::class, 'signup']);

    //Clientes
    Route::get('clientes', [ClienteController::class, 'indexClienteApi']);
    Route::get('clientes/{id}', [ClienteController::class, 'showClienteApi']);
    Route::post('clientes/store', [ClienteController::class, 'storeClienteApi']);
    Route::put('clientes/update/{id}', [ClienteController::class, 'updateClienteApi']);
    Route::delete('clientes/delete/{id}', [ClienteController::class, 'deleteClienteApi']);

    //Formas de Pagamento
    Route::get('formasPagamento', [FormaPagamentoController::class, 'indexFormaPagamentoApi']);
    Route::get('formasPagamento/{id}', [FormaPagamentoController::class, 'showFormaPagamentoApi']);
    Route::post('formasPagamento/store', [FormaPagamentoController::class, 'storeFormaPagamentoApi']);
    Route::put('formasPagamento/update/{id}', [FormaPagamentoController::class, 'updateFormaPagamentoApi']);
    Route::delete('formasPagamento/delete/{id}', [FormaPagamentoController::class, 'deleteFormaPagamentoApi']);

    //Produtos
    Route::get('produtos', [ProdutoController::class, 'indexProdutoApi']);
    Route::get('produtos/{id}', [ProdutoController::class, 'showProdutoApi']);
    Route::post('produtos/store', [ProdutoController::class, 'storeProdutoApi']);
    Route::put('produtos/update/{id}', [ProdutoController::class, 'updateProdutoApi']);
    Route::delete('produtos/delete/{id}', [ProdutoController::class, 'deleteProdutoApi']);

    //Vendas 
    Route::get('vendas', [VendaController::class, 'indexVendaApi']);
    Route::get('vendas/{id}', [VendaController::class, 'showVendaApi']);
    Route::post('vendas/store', [VendaController::class, 'storeVendaApi']);
    Route::put('vendas/update/{id}', [VendaController::class, 'updateVendaApi']);
    Route::delete('vendas/delete/{id}', [VendaController::class, 'deleteVendaApi']);
});
