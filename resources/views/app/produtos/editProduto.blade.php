@extends('app._layouts.base')

@section('content')   

@section('title') 
    <h4 class="page-title">PRODUTOS</h4>
@endsection

@section('sub_title')
<h2>Editar Produto<small></small></h2>
@endsection

<form method="POST" action="/app/produtos/{{ $produto->id }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nome" name="nome" maxlenght="100" value="{{ $produto->nome }}" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantidade">Quantidade <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="number" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}" maxlenght="4" 
            class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="preco">Preço(R$) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" id="money" name="preco" value="{{ $produto->preco }}" maxlenght="20" 
            class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="observacao">Observação
        </label>
        <div class="col-md-6 col-sm-6 ">
        <textarea style="resize: none" class="form-control" name="observacao" 
        id="observacao" cols="38" rows="5">{{ $produto->observacao }}</textarea>
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <div style="text-align:center">
                <button type="submit" name="salvar" class="btn btn-info">
                    <i class="fa fa-save"></i> Salvar
                </button>

                <a href="{{ route('app.produtos.indexProduto') }}" class="btn btn-info">
                    <i class="fa fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </div>
</form>
@endsection
