@extends('app._layouts.base')

@section('title')
<h4 class="page-title">VENDAS</h4>
@endsection

@section('sub_title')
<h2>Editar Venda<small></small></h2>
@endsection

@section('content')
<form method="POST" action="/app/vendas/{{ $venda->id }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')

    <input type="hidden" name="old_produto_id" value="{{ $venda->produto_id }}">
    <input type="hidden" name="old_quantidade" value="{{ $venda->old_quantidade }}">

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Cliente 
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" class="form-control" value="{{ $venda->cliente }}" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Produto <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="produto_id" class="form-control" required>
                <option value=""> -- Selecione um Produto --</option>
                @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}" @if ($produto->id == $venda->produto_id) selected @endif>
                    {{ $produto->nome }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Forma de Pagamento <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <select name="forma_pagamento_id" class="form-control" required>
                <option value=""> -- Selecione uma Forma de Pagamento --</option>
                @foreach ($pagamentos as $pagamento)
                <option value="{{ $pagamento->id }}" @if ($pagamento->id == $venda->forma_pagamento_id) selected @endif>
                    {{ $pagamento->nome }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Quantidade <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" id="quantidade" name="quantidade" maxlenght="4" class="form-control form-control-line" value="{{ $venda->quantidade }}" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Observação
        </label>
        <div class="col-md-6 col-sm-6 ">
            <textarea style="resize: none" class="form-control" name="observacao" id="observacao" cols="38" rows="5" value="{{ $venda->observacao }}">{{ $venda->observacao }}</textarea>
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

    <br />
    <br />
</form>
@endsection