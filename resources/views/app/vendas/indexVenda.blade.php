@extends('app._layouts.base')

@section('content')

@section('title')
<h4 class="page-title">VENDAS</h4>
@endsection

@section('sub_title')
<h2>Lista de Vendas<small></small></h2>
@endsection

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="item form-group">
                <div class="pull-left">
                    <a href="{{ route ('app.vendas.createVenda') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> Novo</a>
                    <a href="{{ route('app.dashboard') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Voltar</a>
                    <br />
                </div>
            </div>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário (R$)</th>
                        <th>Total Fatura (R$)</th>
                        <th width="10%">Visualizar</th>
                        <th width="7%">Editar</th>
                        <th width="7%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->cliente }}</td>
                        <td>{{ $venda->produto }}</td>
                        <td>{{ $venda->quantidade }}</td>
                        <td>{{ number_format($venda->preco_unitario, 2, ',', '.') }}</td>
                        <td>{{ number_format($venda->preco_total, 2, ',', '.') }}</td>
                        <td style="text-align:center"><a href="/app/vendas/{{ $venda->id }}/show/">
                                <i class="fa fa-eye" title="Visualizar Venda"></i></a>
                            </a></td>

                        <td style="text-align:center"><a href="/app/vendas/{{ $venda->id }}/edit/">
                                <i class="fa fa-edit" title="Editar Venda"></i></a>
                        </td>

                        <td style="text-align:center">
                            <form action="/app/vendas/{{ $venda->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""><a href="/app/vendas/{{ $venda->id }}">
                                        <i class="fa fa-trash" onclick="return confirm('Deseja realmente Deletar este Venda?');" title="Deletar Venda"></i></a></button>
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