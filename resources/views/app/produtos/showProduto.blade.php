@extends('app._layouts.base')

@section('content')   

@section('title') 
    <h4 class="page-title">PRODUTOS</h4>
@endsection

@section('sub_title')
<h2>Visualizar Produto<small></small></h2>
@endsection

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome 
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" value="{{ $produto->nome }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantidade">Quantidade 
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="number" value="{{ $produto->quantidade }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="preco">Preço(R$) 
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ number_format($produto->preco, 2, ',', '.') }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="observacao">Observação
        </label>
        <div class="col-md-6 col-sm-6 ">
        <textarea style="resize: none" class="form-control" 
        cols="38" rows="5" readonly>{{ $produto->observacao }}</textarea>
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
