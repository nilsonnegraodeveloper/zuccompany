<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\FormaPagamento;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index()
    {
        $vendas = $this->venda
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->join('forma_pagamentos', 'vendas.forma_pagamento_id', '=', 'forma_pagamentos.id')
            ->select(
                'vendas.*',
                'vendas.id',
                'clientes.nome AS cliente',
                'produtos.nome AS produto',
                'forma_pagamentos.nome AS forma_pagamento',
                'vendas.quantidade',
                'vendas.preco_unitario',
                'vendas.preco_total'
            )
            ->get();
        return view('app.vendas.indexVenda', compact('vendas'));
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venda = $this->venda
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->join('forma_pagamentos', 'vendas.forma_pagamento_id', '=', 'forma_pagamentos.id')
            ->select(
                'vendas.*',
                'vendas.id',
                'clientes.id',
                'clientes.nome AS cliente',
                'produtos.id',
                'produtos.nome AS produto',
                'forma_pagamentos.id',
                'forma_pagamentos.nome AS forma_pagamento',
                'vendas.quantidade',
                'vendas.preco_unitario',
                'vendas.preco_total'
            )
            ->where('vendas.id', $id)
            ->first();
        return view('app.vendas.showVenda', ['venda' => $venda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::select(
            'produtos.*',
            'produtos.id',
            'produtos.nome'
        )->where('produtos.quantidade', '>', 0)
        ->get();
        $pagamentos = FormaPagamento::all();
        return view('app.vendas.createVenda', compact('clientes', 'produtos', 'pagamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|integer',
            'produto_id' => 'required|integer',
            'forma_pagamento_id' => 'required|integer',
            'quantidade' => 'required|integer'
        ]);

        $produto = Produto::find($request->produto_id);
        $valorTotal = $request->quantidade * $produto->preco;
        
        if ($produto->quantidade < $request->quantidade) :
            return redirect('app/vendas')->with('warning', 'Somente Disponível '.$produto->quantidade. ' Unidade(s) deste Produto no Estoque!');
        else :            
            $updateQuantidadeProduto = $produto->quantidade - $request->quantidade;
            Produto::where(['id'=>$produto->id])->update([
                'quantidade' => $updateQuantidadeProduto,
            ]);  
    
            $venda = $this->venda;
            $venda->cliente_id = $request->cliente_id;
            $venda->produto_id = $request->produto_id;
            $venda->forma_pagamento_id = $request->forma_pagamento_id;
            $venda->quantidade = $request->quantidade;
            $venda->preco_unitario = $produto->preco;
            $venda->preco_total = $valorTotal;
            $venda->observacao = $request->observacao;
    
            try { 

                $venda->save();
                return redirect('app/vendas')->with('success', 'Venda cadastrada com Sucesso!');
            } catch (\Illuminate\Database\QueryException $ex) {
                redirect()->back()->with('error', 'Erro ao tentar cadastrar a Venda!');
            }
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venda = $this->venda->find($id)
        ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
        ->select(
            'vendas.*',
            'vendas.id',
            'clientes.id',
            'clientes.nome AS cliente',
            'vendas.quantidade',
            'vendas.quantidade AS old_quantidade'
        )
        ->where('vendas.id', $id)
        ->first();
        $clientes = Cliente::all();
        $produtos = Produto::select(
            'produtos.*',
            'produtos.id',
            'produtos.nome'
        )->where('produtos.quantidade', '>', 0)
        ->get();
        $pagamentos = FormaPagamento::all();
        return view('app.vendas.editVenda', compact('venda', 'clientes', 'produtos', 'pagamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([            
            'produto_id' => 'required|integer',
            'forma_pagamento_id' => 'required|integer',
            'quantidade' => 'required|integer'
        ]);

        $oldProduto = Produto::find($request->old_produto_id);
        $newProduto = Produto::find($request->produto_id);

        $produto = Produto::find($request->produto_id);
        $valorTotal = $request->quantidade * $produto->preco;
        
        if ($produto->quantidade < $request->quantidade) :
            return redirect('app/vendas')->with('warning', 'Somente Disponível '.$produto->quantidade. ' Unidade(s) deste Produto no Estoque!');
        else :   
            
            if($request->old_produto_id != $request->produto_id):
                $updateQuantidadeNewProduto = $newProduto->quantidade - $request->quantidade;
                Produto::where(['id'=>$request->produto_id])->update([
                    'quantidade' => $updateQuantidadeNewProduto,
                ]);  
    
                $updateQuantidadeOldProduto = $oldProduto->quantidade + $request->old_quantidade;
                Produto::where(['id'=>$request->old_produto_id])->update([
                    'quantidade' => $updateQuantidadeOldProduto,
                ]);
            else:
                $updateQuantidadeProduto = ($request->old_quantidade - $request->quantidade) + $oldProduto->quantidade;
                Produto::where(['id'=>$produto->id])->update([
                    'quantidade' => $updateQuantidadeProduto,
                ]);
            endif;
    
            $venda = $this->venda->find($id);
            $venda->produto_id = $request->produto_id;
            $venda->forma_pagamento_id = $request->forma_pagamento_id;
            $venda->quantidade = $request->quantidade;
            $venda->preco_unitario = $produto->preco;
            $venda->preco_total = $valorTotal;
            $venda->observacao = $request->observacao;
    
            try { 

                $venda->update();
                return redirect('app/vendas')->with('success', 'Venda atualizada com Sucesso!');
            } catch (\Illuminate\Database\QueryException $ex) {
                redirect()->back()->with('error', 'Erro ao tentar atualizar Venda!');
            }
        endif;        
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = $this->venda->find($id);

        $produto = Produto::find($venda->produto_id);
        $updateQuantidadeProduto = $produto->quantidade + $venda->quantidade;
            Produto::where(['id'=>$produto->id])->update([
                'quantidade' => $updateQuantidadeProduto,
            ]);

        try {
            $venda->delete();
            return redirect('app/vendas')->with('success', 'Venda deletada com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar deletar Venda!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVendaApi()
    {
        $venda = $this->venda->all();

        if ($venda === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Vendas!'], 404);
        else :
            return response()->json($venda, 200);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVendaApi(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|integer',
            'produto_id' => 'required|integer',
            'forma_pagamento_id' => 'required|integer',
            'quantidade' => 'required|integer'
        ]);

        $produto = Produto::find($request->produto_id);
        $valorTotal = $request->quantidade * $produto->preco;

        if ($produto->quantidade < $request->quantidade) :
            return response()->json(['error' => 'Somente Disponível '.$produto->quantidade. ' Unidade(s) deste Produto no Estoque!'], 404);
        else :
            $updateQuantidadeProduto = $produto->quantidade - $request->quantidade;
            Produto::where(['id'=>$produto->id])->update([
                'quantidade' => $updateQuantidadeProduto,
            ]);  
    
            $venda = $this->venda;
            $venda->cliente_id = $request->cliente_id;
            $venda->produto_id = $request->produto_id;            
            $venda->forma_pagamento_id = $request->forma_pagamento_id;
            $venda->quantidade = $request->quantidade;
            $venda->preco_unitario = $produto->preco;
            $venda->preco_total = $valorTotal;
            $venda->observacao = $request->observacao;

            if ($venda === null) :
                return response()->json(['error' => 'Erro ao tentar cadastrar Venda!'], 404);
            else :                
                $venda->save();
                return response()->json($venda, 200);
            endif;            
        endif;      
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function showVendaApi($id)
    {
        $venda = $this->venda->find($id);

        if ($venda === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Venda!'], 404);
        else :
            return response()->json($venda, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function updateVendaApi(Request $request, $id)
    {
        $request->validate([
            'produto_id' => 'required|integer',
            'forma_pagamento_id' => 'required|integer',
            'quantidade' => 'required|integer'
        ]);

        $oldProduto = Produto::find($request->old_produto_id);
        $newProduto = Produto::find($request->produto_id);

        $produto = Produto::find($request->produto_id);
        $valorTotal = $request->quantidade * $produto->preco;

        if ($produto->quantidade < $request->quantidade) :
            return response()->json(['error' => 'Somente Disponível '.$produto->quantidade. ' Unidade(s) deste Produto no Estoque!'], 404);
        else :            
            if($request->old_produto_id != $request->produto_id):
                $updateQuantidadeNewProduto = $newProduto->quantidade - $request->quantidade;
                Produto::where(['id'=>$request->produto_id])->update([
                    'quantidade' => $updateQuantidadeNewProduto,
                ]);  
    
                $updateQuantidadeOldProduto = $oldProduto->quantidade + $request->old_quantidade;
                Produto::where(['id'=>$request->old_produto_id])->update([
                    'quantidade' => $updateQuantidadeOldProduto,
                ]);
            else:
                $updateQuantidadeProduto = ($request->old_quantidade - $request->quantidade) + $oldProduto->quantidade;
                Produto::where(['id'=>$produto->id])->update([
                    'quantidade' => $updateQuantidadeProduto,
                ]);
            endif;
    
            $venda = $this->venda->find($id);
            $venda->produto_id = $request->produto_id;
            $venda->forma_pagamento_id = $request->forma_pagamento_id;
            $venda->quantidade = $request->quantidade;
            $venda->preco_unitario = $produto->preco;
            $venda->preco_total = $valorTotal;
            $venda->observacao = $request->observacao;

            if ($venda === null) :
                return response()->json(['error' => 'Erro a tentar atualizar Venda!'], 404);
            else :            
                $venda->update();
                return response()->json($venda, 200);
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function deleteVendaApi($id)
    {
        $venda = $this->venda->find($id);

        $produto = Produto::find($venda->produto_id);
        $updateQuantidadeProduto = $produto->quantidade + $venda->quantidade;
            Produto::where(['id'=>$produto->id])->update([
                'quantidade' => $updateQuantidadeProduto,
            ]);

        if ($venda === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Venda!'], 404);
        else :
            $venda->delete();
            return response()->json(['message' => 'Venda deletada com Successo!'], 200);
        endif;
    }
}
