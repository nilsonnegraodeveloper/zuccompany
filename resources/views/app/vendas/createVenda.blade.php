@extends('app._layouts.base')

@section('content')

@section('title')
    <h4 class="page-title">VENDAS</h4>
@endsection

@section('sub_title')
<h2>Cadastrar Venda<small></small></h2>
@endsection

<form method="POST" action="{{ route('app.vendas.storeVenda') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Cliente <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <select name="cliente_id" class="form-control" value="{{ old('cliente_id') }}" required>
                <option value=""> -- Selecione um Cliente -- </option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Produto <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <select name="produto_id" class="form-control" value="{{ old('produto_id') }}" required>
                <option value=""> -- Selecione um Produto --</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Forma de Pagamento <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <select name="forma_pagamento_id" class="form-control" value="{{ old('forma_pagamento_id') }}" required>
                <option value=""> -- Selecione uma Forma de Pagamento --</option>
                @foreach ($pagamentos as $pagamento)
                    <option value="{{ $pagamento->id }}">{{ $pagamento->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Quantidade <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" maxlenght="4" 
            class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Observação
        </label>
        <div class="col-md-6 col-sm-6 ">
        <textarea style="resize: none" class="form-control"value="{{ old('observacao') }}" name="observacao" 
        id="observacao" cols="38" rows="5"></textarea>
        </div>
    </div>
    
    <div class="ln_solid"></div>
    
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <div style="text-align:center">
        <button type="submit" name="salvar" class="btn btn-info">
                <i class="fa fa-save"></i> Salvar
            </button>

            <a href="{{ route('app.vendas.indexVenda') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>
</form>

@endsection
