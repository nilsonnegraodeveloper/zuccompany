@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">CLIENTES</h4>
@endsection

@section('sub_title')
<h2>Lista de Clientes<small></small></h2>
@endsection

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="item form-group">
                <div class="pull-left">
                    <a href="{{ route ('app.clientes.createCliente') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Novo</a>
                    <a href="{{ route ('app.dashboard') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Voltar</a>
                    <br />
                </div>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th width="10%">Visualizar</th>
                        <th width="7%">Editar</th>
                        <th width="7%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td style="text-align:center"><a href="/app/clientes/{{ $cliente->id }}/show/">
                                <i class="fa fa-eye" title="Visualizar clientee"></i></a>
                            </a></td>

                        <td style="text-align:center"><a href="/app/clientes/{{ $cliente->id }}/edit/">
                                <i class="fa fa-edit" title="Editar clientee"></i></a>
                        </td>

                        <td style="text-align:center">
                            <form action="/app/clientes/{{ $cliente->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""><a href="/app/clientes/{{ $cliente->id }}">
                                        <i class="fa fa-trash" onclick="return confirm('Deseja realmente Deletar este cliente?');" title="Deletar cliente"></i></a></button>
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