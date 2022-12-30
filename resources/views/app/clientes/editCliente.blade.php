@extends('app._layouts.base')

@section('content')   

@section('title') 
    <h4 class="page-title">CLIENTES</h4>
@endsection

@section('sub_title')   
<h2>Editar Cliente<small></small></h2>
@endsection

<form method="POST" action="/app/clientes/{{ $cliente->id }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    @csrf
    @method('PUT')
   
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nome">Nome <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="nome" value="{{ $cliente->nome }}" name="nome" maxlenght="100" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">CPF <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="cpf" name="cpf" value="{{ $cliente->cpf }}" maxlenght="14" class="form-control" data-mask-for-cpf-cnpj required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Telefone <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="telefone" name="telefone" value="{{ $cliente->telefone }}" onkeyup="mascara(this, mtel);" maxlength="15" class="form-control" required>
        </div>
    </div>
    
    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">E-mail <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
            <input type="email" id="email" name="email" value="{{ $cliente->email }}" maxlenght="200" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="mail@exemplo.com, mail@exemplo.com.br" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">CEP <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" class="form-control" name="cep" id="cep" value="{{ $cliente->cep }}" maxlength="10" onblur="pesquisacep(this.value);" required>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Endereço (<i>Rua, Nº...</i>) <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}" maxlength="200" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Complemento</label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="complemento" id="complemento" value="{{ $cliente->complemento }}" maxlength="200" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bairro <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" name="bairro" id="bairro" value="{{ $cliente->bairro }}" maxlength="100" class="form-control" required>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Cidade <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $cliente->cidade }}" maxlength="100" required>
        </div>
    </div>

    <div class="item form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Estado <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
        <input type="text" class="form-control" name="estado" id="estado" value="{{ $cliente->estado }}" maxlength="2" required>
        </div>
    </div>

    <div class="ln_solid"></div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
        <div style="text-align:center">
        <button type="submit" name="salvar" class="btn btn-info">
                <i class="fa fa-save"></i> Salvar
            </button>

            <a href="{{ route('app.clientes.indexCliente') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>            
        </div>
    </div>    
</form>

@endsection
