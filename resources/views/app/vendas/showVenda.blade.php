@extends('app._layouts.base')

@section('title')   
<h4 class="page-title">VENDAS</h4>
@endsection

@section('sub_title')
<h2>Visualizar Venda<small></small></h2>
@endsection

@section('content')   

<form class="form-horizontal form-material">

    <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Cliente
        </label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" value="{{ $venda->cliente }}" readonly>
        </div>
    </div>

    <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Produto
        </label>    
        <div class="ol-md-6 col-sm-6">
            <input type="text" class="form-control" value="{{ $venda->produto }}" 
            readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Forma de Pagamento
        </label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" value="{{ $venda->forma_pagamento }}" readonly>
        </div>
    </div>

    <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Quantidade
        </label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" value="{{ $venda->quantidade }}" 
            readonly>
        </div>
    </div>    
    
    <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Total (R$)
        </label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" value="{{ number_format($venda->preco_total, 2, ',', '.') }}" 
            readonly>
        </div>
    </div>  

    <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Observação
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea style="resize: none" class="form-control" cols="38" rows="5" readonly>{{ $venda->observacao }}</textarea>
        </div>
    </div>

    <div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        
        <div style="text-align:center">  
            <a href="{{ route('app.vendas.indexVenda') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

<br />
<br />
</form>

@endsection
