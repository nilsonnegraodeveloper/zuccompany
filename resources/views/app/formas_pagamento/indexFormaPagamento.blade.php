@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">FORMAS DE PAGAMENTO</h4>
@endsection

@section('sub_title')
<h2>Lista de Formas de Pagamento<small></small></h2>
@endsection

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="item form-group">
                <div class="pull-left">

                    <a href="{{ route ('app.formas_pagamento.createFormaPagamento') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Novo</a>
                    <a href="{{ route('app.dashboard') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Voltar</a>
                    <br />
                </div>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="7%">ID</th>
                        <th>Nome</th>
                        <th width="10%">Visualizar</th>
                        <th width="7%">Editar</th>
                        <th width="7%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formaPagamentos as $formaPagamento)
                    <tr>
                        <td>{{ $formaPagamento->id }}</td>
                        <td>{{ $formaPagamento->nome }}</td>
                        <td style="text-align:center"><a href="/app/formasPagamento/{{ $formaPagamento->id }}/show/">
                                <i class="fa fa-eye" title="Visualizar Forma de Pagamento"></i></a>
                            </a></td>

                        <td style="text-align:center"><a href="/app/formasPagamento/{{ $formaPagamento->id }}/edit/">
                                <i class="fa fa-edit" title="Editar Forma de Pagamento"></i></a>
                        </td>

                        <td style="text-align:center">
                            <form action="/app/formasPagamento/{{ $formaPagamento->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""><a href="/app/formasPagamento/{{ $formaPagamento->id }}">
                                        <i class="fa fa-trash" onclick="return confirm('Deseja realmente Deletar este Forma de Pagamento?');" title="Deletar formaPagamento"></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br />
@endsection