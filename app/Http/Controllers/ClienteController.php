<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        return view('app.clientes.indexCliente', compact('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cliente = $this->cliente->find($id);
        return view('app.clientes.showCliente', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.clientes.createCliente');
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
            'cpf' => 'required|min:14|max:14',
            'telefone' => 'required|min:14|max:15',
            'email' => 'required|min:8|max:255',
            'endereco' => 'required|min:3|max:255',
            'bairro' => 'required|min:3|max:100',
            'cidade' => 'required|min:3|max:50',
            'cep' => 'required',
            'estado' => 'required|min:2|max:2'
        ]);

        $cliente = $this->cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->complemento = $request->complemento;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;

        try {
            $cliente->save();
            return redirect('app/clientes')->with('success', 'Cliente cadastrado com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', 'Erro ao tentar cadastrar Cliente!'. $ex);
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
        $cliente = $this->cliente->find($id);
        return view('app.clientes.editCliente', ['cliente' => $cliente]);
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
            'cpf' => 'required|min:14|max:14',
            'telefone' => 'required|min:14|max:15',
            'email' => 'required|min:8|max:255',
            'endereco' => 'required|min:3|max:255',
            'bairro' => 'required|min:3|max:100',
            'cidade' => 'required|min:3|max:50',
            'cep' => 'required',
            'estado' => 'required|min:2|max:2'
        ]);

        $cliente = $this->cliente->find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->complemento = $request->complemento;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;

        try {
            $cliente->update();
            return redirect('app/clientes')->with('success', 'Cliente atualizado com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', 'Erro ao tentar atualizar Cliente!');
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
        $cliente = $this->cliente->find($id);

        try {
            $cliente->delete();
            return redirect('app/clientes')->with('success', 'Cliente deletado com Sucesso!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', 'Erro ao tentar deletar Cliente!');
        }
    }

    //**** API *********//

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexClienteApi()
    {       
        $cliente = $this->cliente
            ->with('vendas')
            ->orderBy('clientes.id', 'ASC')
            ->get();

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar Listar Clientes!'], 404);
        else :
            return response()->json($cliente, 200);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClienteApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|min:14|max:14',
            'telefone' => 'required|min:14|max:15',
            'email' => 'required|min:8|max:255',
            'endereco' => 'required|min:3|max:255',
            'bairro' => 'required|min:3|max:100',
            'cidade' => 'required|min:3|max:50',
            'cep' => 'required',
            'estado' => 'required|min:2|max:2'
        ]);

        $cliente = $this->cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->complemento = $request->complemento;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar cadastrar Cliente!'], 404);
        else :
            $cliente->save();
            return response()->json($cliente, 200);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function showClienteApi($id)
    {
        $cliente = $this->cliente->find($id);

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar visualizar Cliente!'], 404);
        else :
            return response()->json($cliente, 200);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function updateClienteApi(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|min:14|max:14',
            'telefone' => 'required|min:14|max:15',
            'email' => 'required|min:8|max:255',
            'endereco' => 'required|min:3|max:255',
            'bairro' => 'required|min:3|max:100',
            'cidade' => 'required|min:3|max:50',
            'cep' => 'required',
            'estado' => 'required|min:2|max:2'
        ]);

        $cliente = $this->cliente->find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->complemento = $request->complemento;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->cep = $request->cep;
        $cliente->estado = $request->estado;

        if ($cliente === null) :
            return response()->json(['error' => 'Erro a tentar atualizar Cliente!'], 404);
        else :            
            $cliente->update();
            return response()->json($cliente, 200);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer
     * @return \Illuminate\Http\Response
     */
    public function deleteClienteApi($id)
    {
        $cliente = $this->cliente->find($id);

        if ($cliente === null) :
            return response()->json(['error' => 'Erro ao tentar deletar Cliente!'], 404);
        else :
            $cliente->delete();
            return response()->json(['message' => 'Cliente deletado com Successo!'], 200);
        endif;
    }
}
