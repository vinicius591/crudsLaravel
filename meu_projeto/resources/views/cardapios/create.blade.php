@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-8 flex items-center justify-center overflow-y-auto">
        <div class="w-full max-w-md mx-auto">

            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
                    Adicionar Novo Item no Cardápio
                </h2>
            </div>
            
            <div class="bg-white py-8 px-4 shadow-sm sm:rounded-xl sm:px-10 border border-gray-200">

                <form action="{{ route('cardapios.store') }}" method="POST" class="space-y-6">
                    @csrf 

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome do Item</label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required placeholder="Ex: Risoto de Alho Poró"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('nome')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                        <input type="number" id="preco" name="preco" step="0.01" value="{{ old('preco') }}" required placeholder="0.00"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('preco')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="disponivel" class="block text-sm font-medium text-gray-700 mb-1">Disponibilidade</label>
                        <select id="disponivel" name="disponivel" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                            <option value="1" {{ old('disponivel') == '1' ? 'selected' : '' }}>Disponível imediatamente</option>
                            <option value="0" {{ old('disponivel') == '0' ? 'selected' : '' }}>Indisponível / Fora de estoque</option>
                        </select>
                        @error('disponivel')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <a href="{{ url('/cardapios') }}" class="w-1/2 sm:w-auto">
                            <button type="button" class="w-full inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                Cancelar
                            </button>
                        </a>
                        <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-gray-500 shadow-sm hover:bg-blue-700 focus:outline-none transition duration-150">
                            Salvar Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection