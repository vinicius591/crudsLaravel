<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca os itens do cardápio do banco
        $cardapios = Cardapio::all(); 
        // Retorna a view enviando os dados obtidos
        return view('cardapios.index', compact('cardapios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cardapios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados que vêm do formulário
        $request->validate([
            'nome'       => 'required|string|max:255',
            'preco'      => 'required|numeric',
            'disponivel' => 'required|boolean', // Espera true/false ou 1/0
        ]);

        // 2. Criar o registro no banco
        Cardapio::create([
            'nome'       => $request->nome,
            'preco'      => $request->preco,
            'disponivel' => $request->disponivel,
        ]);

        // 3. Redirecionar com a mensagem de sucesso
        return redirect()->route('cardapios.index')->with('success', 'Item adicionado ao cardápio com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cardapio $cardapio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cardapio $cardapio)
    {
        return view('cardapios.edit', compact('cardapio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'       => 'required|string|max:255',
            'preco'      => 'required|numeric',
            'disponivel' => 'required|boolean',
        ]);
    
        $cardapio = Cardapio::findOrFail($id);
        
        // Atualiza o registro
        $cardapio->update([
            'nome'       => $request->nome,
            'preco'      => $request->preco,
            'disponivel' => $request->disponivel,
        ]);
    
        // Redirecionamento estável
        return redirect()->to('/cardapios')->with('success', 'Cardápio atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cardapio = Cardapio::findOrFail($id);
        $cardapio->delete();

        return redirect()->route('cardapios.index')->with('success', 'Item excluído do cardápio com sucesso!');
    }
}