<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca as mesas do banco
        $mesas = Mesas::all(); 
        // Retorna a view enviando os dados obtidos
        return view('mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados que vêm do formulário
        $request->validate([
            'numero_mesa' => 'required|integer|unique:mesas,numero_mesa', // Garante número único
            'capacidade'  => 'required|integer|min:1',
            'status'      => 'required|string|max:255', // Ex: 'disponivel', 'ocupada', 'reservada'
        ]);

        // 2. Criar o registro no banco
        Mesas::create([
            'numero_mesa' => $request->numero_mesa,
            'capacidade'  => $request->capacidade,
            'status'      => $request->status,
        ]);

        // 3. Redirecionar com a mensagem de sucesso
        return redirect()->route('mesas.index')->with('success', 'Mesa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mesas $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mesa = Mesas::findOrFail($id);
        return view('mesas.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'numero_mesa' => 'required|integer|unique:mesas,numero_mesa,' . $id, // Ignora a própria mesa na validação de único
            'capacidade'  => 'required|integer|min:1',
            'status'      => 'required|string|max:255',
        ]);
    
        $mesa = Mesas::findOrFail($id);
        
        // Atualiza o registro
        $mesa->update([
            'numero_mesa' => $request->numero_mesa,
            'capacidade'  => $request->capacidade,
            'status'      => $request->status,
        ]);
    
        // Redirecionamento estável
        return redirect()->to('/mesas')->with('success', 'Mesa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mesa = Mesas::findOrFail($id);
        $mesa->delete();

        return redirect()->route('mesas.index')->with('success', 'Mesa excluída com sucesso!');
    }
}