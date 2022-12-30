@extends('app._layouts.base')

@section('title')   
<h4 class="page-title">CLIENTES</h4>
@endsection

@section('sub_title')   
<h2>Visualizar Cliente<small></small></h2>
@endsection

@section('content')   

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
       
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome 
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" value="{{ $cliente->nome }}"  class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cpf">CPF 
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" value="{{ $cliente->cpf }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefone">Telefone 
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" value="{{ $cliente->telefone }}" class="form-control" readonly>
        </div>
    </div>
    
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="email">E-mail </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="email" value="{{ $cliente->email }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cep">CEP 
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" class="form-control" value="{{ $cliente->cep }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="endereco">Endereço (<i>Rua, Nº...</i>) </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ $cliente->endereco }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="complemento">Complemento</label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ $cliente->complemento }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="bairro">Bairro </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ $cliente->bairro }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="cidade">Cidade </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ $cliente->cidade }}" class="form-control" readonly>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align" for="estado">Estado </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" value="{{ $cliente->estado }}" class="form-control" readonly>
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">        
        <div style="text-align:center">       
            <a href="{{ route('app.clientes.indexCliente') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>    
</form>

@endsection
