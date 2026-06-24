@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-12 flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50 min-h-screen">
        <div class="w-full max-w-lg mx-auto">

            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-tr from-amber-500 to-orange-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md rotate-3 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-amber-900">
                    Novo Item no Cardápio
                </h2>
                <p class="text-sm text-amber-700/80 mt-1">Adicione pratos, bebidas ou sobremesas</p>
            </div>   

            <div class="bg-white py-8 px-6 shadow-xl rounded-3xl border-2 border-amber-100/50 sm:px-10">

                <form action="{{ url('/cardapios') }}" method="POST" class="space-y-5">
                    @csrf 

                    <div>
                        <label for="nome" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Nome do Item</label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required placeholder="Ex: Risoto de Alho Poró"
                               class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                        @error('nome')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>   

                    <div>
                        <label for="preco" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Preço (R$)</label>
                        <input type="number" id="preco" name="preco" step="0.01" value="{{ old('preco') }}" required placeholder="0,00"
                               class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                        @error('preco')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>   

                    <div>
                        <label for="disponivel" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Disponibilidade</label>
                        <select id="disponivel" name="disponivel" required
                                class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                            <option value="1" {{ old('disponivel') == '1' ? 'selected' : '' }}>Disponível imediatamente</option>
                            <option value="0" {{ old('disponivel') == '0' ? 'selected' : '' }}>Indisponível / Fora de estoque</option>
                        </select>
                        @error('disponivel')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>   

                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <a href="{{ url('/cardapios') }}" class="w-1/2 sm:w-auto">
                            <button type="button" class="w-full inline-flex justify-center rounded-xl bg-gray-100 px-5 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 focus:outline-none transition-colors duration-150">
                                Cancelar
                            </button>
                        </a>
                        <button type="submit" class="inline-flex justify-center rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-3 text-sm font-bold text-white shadow-md hover:from-amber-600 hover:to-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-200 transition-all duration-150 transform active:scale-95">
                            Salvar Item
                        </button>
                    </div>   
                </form>
            </div>   
        </div>
    </main>
@endsection