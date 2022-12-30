@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">FORMAS DE PAGAMENTO</h4>
@endsection

@section('sub_title')
<h2>Cadastrar Forma de Pagamento<small></small></h2>
@endsection

<form method="POST" action="{{ route('app.formas_pagamento.storeFormaPagamento') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" maxlenght="100" class="form-control" required>
        </div>
    </div>
    
    <div class="ln_solid"></div>
    
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <div style="text-align:center">
        <button type="submit" name="salvar" class="btn btn-info">
                <i class="fa fa-save"></i> Salvar
            </button>

            <a href="{{ route('app.formas_pagamento.indexFormaPagamento') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>
</form>
@endsection