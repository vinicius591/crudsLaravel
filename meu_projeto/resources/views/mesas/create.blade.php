@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-8 flex items-center justify-center overflow-y-auto">
        <div class="w-full max-w-md mx-auto">

            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                </div>
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
                    Adicionar Nova Mesa
                </h2>
            </div>
            
            <div class="bg-white py-8 px-4 shadow-sm sm:rounded-xl sm:px-10 border border-gray-200">

                <form action="{{ route('mesas.store') }}" method="POST" class="space-y-6">
                    @csrf 

                    <div>
                        <label for="numero_mesa" class="block text-sm font-medium text-gray-700 mb-1">Número da Mesa</label>
                        <input type="text" id="numero_mesa" name="numero_mesa" value="{{ old('numero_mesa') }}" required placeholder="Ex: 05, Varanda 2"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('numero_mesa')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="capacidade" class="block text-sm font-medium text-gray-700 mb-1">Capacidade (Pessoas)</label>
                        <input type="number" id="capacidade" name="capacidade" min="1" value="{{ old('capacidade') }}" required placeholder="Ex: 4"
                               class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                        @error('capacidade')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Inicial</label>
                        <select id="status" name="status" required
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                            <option value="disponivel" {{ old('status') == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                            <option value="ocupada" {{ old('status') == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
                            <option value="reservada" {{ old('status') == 'reservada' ? 'selected' : '' }}>Reservada</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <a href="{{ url('/mesas') }}" class="w-1/2 sm:w-auto">
                            <button type="button" class="w-full inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                Cancelar
                            </button>
                        </a>
                        <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-gray-500 shadow-sm hover:bg-blue-700 focus:outline-none transition duration-150">
                            Salvar Mesa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection