@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-8 flex items-center justify-center overflow-y-auto">
        <div class="w-full max-w-md mx-auto">

            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
                    Adicionar Novo Pedido
                </h2>
            </div>
            
            <div class="bg-white py-8 px-4 shadow-sm sm:rounded-xl sm:px-10 border border-gray-200">

                <form action="{{ route('pedidos.store') }}" method="POST" class="space-y-6">
                    @csrf 

                    <div>
                        <label for="mesa" class="block text-sm font-medium text-gray-700 mb-1">Mesa</label>
                        <input type="text" id="mesa" name="mesa" value="{{ old('mesa') }}" required placeholder="Ex: 5 ou Varanda 2"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('mesa')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="item" class="block text-sm font-medium text-gray-700 mb-1">Item / Produto</label>
                        <input type="text" id="item" name="item" value="{{ old('item') }}" required placeholder="Ex: Filé com Fritas, Suco de Laranja"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('item')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Inicial</label>
                        <select id="status" name="status" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="em_preparo" {{ old('status') == 'em_preparo' ? 'selected' : '' }}>Em Preparo</option>
                            <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <a href="{{ url('/pedidos') }}" class="w-1/2 sm:w-auto">
                            <button type="button" class="w-full inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                Cancelar
                            </button>
                        </a>
                        <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none transition duration-150">
                            Salvar Pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection