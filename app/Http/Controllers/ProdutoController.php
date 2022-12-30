<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->all();
        return view('app.produtos.indexProduto', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.produtos.createProduto');
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
            'nome' => 'required|min:3|max:100',
            'quantidade' => 'required|integer',
            'preco' => 'required'
        ]);

        $produto = $this->produto;
        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->observacao = $request->observacao;
        //$preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $produto->preco = $request->preco;

        try {
            $produto->save();
            return redirect('app/produtos')->with('success', 'Produto cadastrado com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar cadastrar Produto!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $produto = $this->produto->find($id);
        return view('app.produtos.showProduto', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        return view('app.produtos.editProduto', ['produto' => $produto]);
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
            'nome' => 'required|min:3|max:100',
            'quantidade' => 'required|integer',
            'preco' => 'required'
        ]);

        $produto = $this->produto->find($id);
        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->observacao = $request->observacao;
        //$preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $produto->preco = $request->preco;

        try {
            $produto->update();
            return redirect('app/produtos')->with('success', 'Produto atualizar com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar atualizar Produto!');
        }
    }

    /**
     * Remove the specified resource from storage     
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        try {
            $produto->delete();
            return redirect('app/produtos')->with('success', 'Produto deletado com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar deletar Produto!');
        }
    }

    //********* API *******//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProdutoApi()
    {

        $produto = $this->produto->all();

        if ($produto === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Produtos!'], 404);
        else :
            return response()->json($produto, 200);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProdutoApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:200',
            'quantidade' => 'required|integer',
            'preco' => 'required'
        ]);
        
        $produto = $this->produto;
        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->observacao = $request->observacao;
        //$preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $produto->preco = $request->preco;

        if ($produto === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Produto!'], 404);
        else :
            $produto->save();
            return response()->json($produto, 200);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function showProdutoApi($id)
    {
        $produto = $this->produto->find($id);

        if ($produto === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Produto!'], 404);
        else :
            return response()->json($produto, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function updateProdutoApi(Request $request, $id)
    {
        $request->validate([            
            'nome' => 'required|min:3|max:200',
            'quantidade' => 'required|integer',
            'preco' => 'required'
        ]);

        $produto = $this->produto->find($id);
        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->observacao = $request->observacao;
        //$preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $produto->preco = $request->preco;
        
        if ($produto === null) :
            return response()->json(['error' => 'Erro a tentar atualizar Produto!'], 404);
        else :            
            $produto->update();
            return response()->json($produto, 200);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param Integer
     * @return \Illuminate\Http\Response
     */
    public function deleteProdutoApi($id)
    {
        $produto = $this->produto->find($id);

        if ($produto === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Produto!'], 404);
        else :
            $produto->delete();
            return response()->json(['message' => 'Produto deletado com Successo!'], 200);
        endif;
    }
}
