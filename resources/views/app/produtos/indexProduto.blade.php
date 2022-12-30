@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">PRODUTOS</h4>
@endsection

@section('sub_title')
<h2>Lista de Produtos<small></small></h2>
@endsection

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="item form-group">
                <div class="pull-left">
                    <a href="{{ route ('app.produtos.createProduto') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Novo</a>
                    <a href="{{ route ('app.dashboard') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Voltar</a>
                    <br />
                </div>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço(R$)</th>
                        <th width="10%">Visualizar</th>
                        <th width="7%">Editar</th>
                        <th width="7%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td style="text-align:center"><a href="/app/produtos/{{ $produto->id }}/show/">
                                <i class="fa fa-eye" title="Visualizar produtoe"></i></a>
                            </a></td>

                        <td style="text-align:center"><a href="/app/produtos/{{ $produto->id }}/edit/">
                                <i class="fa fa-edit" title="Editar produtoe"></i></a>
                        </td>

                        <td style="text-align:center">
                            <form action="/app/produtos/{{ $produto->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""><a href="/app/produtos/{{ $produto->id }}">
                                        <i class="fa fa-trash" onclick="return confirm('Deseja realmente Deletar este Produto?');" title="Deletar Produto"></i></a></button>
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