<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{

    public function __construct(FormaPagamento $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }

    public function index()
    {
        $formaPagamentos = $this->formaPagamento->all();
        return view('app.formas_pagamento.indexFormaPagamento', compact('formaPagamentos'));
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formaPagamento = $this->formaPagamento->find($id);
        return view('app.formas_pagamento.showFormaPagamento', ['formaPagamento' => $formaPagamento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.formas_pagamento.createFormaPagamento');
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
        ]);

        $formaPagamento = $this->formaPagamento;
        $formaPagamento = $this->request->nome;
    
        try {  
            $formaPagamento->save(); 
            return redirect('app/formasPagamento')->with('success', 'Forma de Pagamento cadastrada com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar cadastrar Forma de Pagamento!');           
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formaPagamento = $this->formaPagamento->find($id);
        return view('app.formas_pagamento.editFormaPagamento', ['formaPagamento' => $formaPagamento]);
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
            'nome' => 'required|min:3|max:100'
        ]);

        $formaPagamento = $this->formaPagamento->find($id);
        $formaPagamento = $this->request->nome;
        
        try {
            $formaPagamento->update();
            return redirect('app/formasPagamento')->with('success', 'Forma de Pagamento atualizada com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar atualizar Forma de Pagamento!');           
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formaPagamento = $this->formaPagamento->find($id);

        try {
            $formaPagamento->delete();
            return redirect('app/formasPagamento')->with('success', 'Forma de Pagamento deletada com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            redirect()->back()->with('error', 'Erro ao tentar deletar Forma de Pagamento!');           
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFormaPagamentoApi()
    {
            $formaPagamento = $this->formaPagamento->all();

        if ($formaPagamento === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Forma de Pagamento!'], 404);
        else :
            return response()->json($formaPagamento, 200);
        endif;
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFormaPagamentoApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100'
        ]);
        
        $formaPagamento = $this->formaPagamento;
        $formaPagamento = $this->request->nome;      

        if ($formaPagamento === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Forma de Pagamento!'], 404);
        else :
            $formaPagamento->save(); 
            return response()->json($formaPagamento, 200);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function showFormaPagamentoApi($id)
    {       
        $formaPagamento = $this->formaPagamento->find($id);            

        if ($formaPagamento === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Forma de Pagamento!'], 404);
        else :
            return response()->json($formaPagamento, 200);
        endif;
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formaPagamento  $formaPagamento
     * @return \Illuminate\Http\Response
     */
    public function updateFormaPagamentoApi(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100'
        ]);

        $formaPagamento = $this->formaPagamento->find($id);
        $formaPagamento = $this->request->nome;; 

        if ($formaPagamento === null) :
            return response()->json(['error' => 'Erro a tentar atualizar Forma de Pagamento!'], 404);
        else :  
            $formaPagamento->update(); 
            return response()->json($formaPagamento, 200);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function deleteFormaPagamentoApi($id)
    {
        $formaPagamento = $this->formaPagamento->find($id);

        if ($formaPagamento === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Forma de Pagamento!'], 404);
        else :
            $formaPagamento->delete();
            return response()->json(['message' => 'Forma de Pagamento deletada com Successo!'], 200);
        endif;
    }
}