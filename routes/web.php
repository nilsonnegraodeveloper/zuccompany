<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormaPagamentoController;

Route::get('/', [UserController::class, 'index'])->name('index'); 
Route::post('/', [UserController::class, 'loginSys'])->name('auth');//Implementando

Route::prefix('/app')->group(function () {
    //Logout
    //Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   
    //Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('app.dashboard');

    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('app.clientes.indexCliente');
    Route::get('/clientes/{id}/show/', [ClienteController::class, 'show'])->name('app.clientes.showCliente');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('app.clientes.createCliente');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('app.clientes.storeCliente');
    Route::get('/clientes/{id}/edit/', [ClienteController::class, 'edit'])->name('app.clientes.editCliente');
    Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('app.clientes.updateCliente');
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('app.clientes.deleteCliente');    

    //Produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('app.produtos.indexProduto');
    Route::get('/produtos/{id}/show/', [ProdutoController::class, 'show'])->name('app.produtos.showProduto');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('app.produtos.createProduto');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('app.produtos.storeProduto');
    Route::get('/produtos/{id}/edit/', [ProdutoController::class, 'edit'])->name('app.produtos.editProduto');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('app.produtos.updateProduto');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('app.produtos.deleteProduto');
    
    //Vendas 
    Route::get('/vendas', [VendaController::class, 'index'])->name('app.vendas.indexVenda');
    Route::get('/vendas/{id}/show/', [VendaController::class, 'show'])->name('app.vendas.showVenda');
    Route::get('/vendas/create', [VendaController::class, 'create'])->name('app.vendas.createVenda');
    Route::post('/vendas', [VendaController::class, 'store'])->name('app.vendas.storeVenda');
    Route::get('/vendas/{id}/edit/', [VendaController::class, 'edit'])->name('app.vendas.editVenda');
    Route::put('/vendas/{id}', [VendaController::class, 'update'])->name('app.vendas.updateVenda');
    Route::delete('/vendas/{id}', [VendaController::class, 'destroy'])->name('app.vendas.deleteVenda');    

    //Formas de Pagamento 
    Route::get('/formasPagamento', [FormaPagamentoController::class, 'index'])->name('app.formas_pagamento.indexFormaPagamento');
    Route::get('/formasPagamento/{id}/show/', [FormaPagamentoController::class, 'show'])->name('app.formas_pagamento.showFormaPagamento');
    Route::get('/formasPagamento/create', [FormaPagamentoController::class, 'create'])->name('app.formas_pagamento.createFormaPagamento');
    Route::post('/formasPagamento', [FormaPagamentoController::class, 'store'])->name('app.formas_pagamento.storeFormaPagamento');
    Route::get('/formasPagamento/{id}/edit/', [FormaPagamentoController::class, 'edit'])->name('app.formas_pagamento.editFormaPagamento');
    Route::put('/formasPagamento/{id}', [FormaPagamentoController::class, 'update'])->name('app.formas_pagamento.updateFormaPagamento');
    Route::delete('/formasPagamento/{id}', [FormaPagamentoController::class, 'destroy'])->name('app.formas_pagamento.deleteFormaPagamento');    
});


