<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca os pedidos do banco
        $pedidos = Pedidos::all(); 
        // Retorna a view enviando os dados obtidos
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados que vêm do formulário
        $request->validate([
            'mesa'   => 'required|integer',
            'item'   => 'required|string|max:255',
            'status' => 'required|string|max:255', // Ex: 'pendente', 'em preparo', 'entregue'
        ]);

        // 2. Criar o registro no banco
        Pedidos::create([
            'mesa'   => $request->mesa,
            'item'   => $request->item,
            'status' => $request->status,
        ]);

        // 3. Redirecionar com a mensagem de sucesso
        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pedido = Pedidos::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'mesa'   => 'required|integer',
            'item'   => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        $pedido = Pedidos::findOrFail($id);
        
        // Atualiza o registro
        $pedido->update([
            'mesa'   => $request->mesa,
            'item'   => $request->item,
            'status' => $request->status,
        ]);
    
        // Redirecionamento estável
        return redirect()->to('/pedidos')->with('success', 'Pedido atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido = Pedidos::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido excluído com sucesso!');
    }
}