@extends('layouts.app')

@section('content')
<main class="flex-1 p-6 md:p-12 flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50 min-h-screen">
    <div class="w-full max-w-lg mx-auto">

        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-tr from-amber-500 to-orange-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md rotate-3 hover:rotate-0 transition-transform duration-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold tracking-tight text-amber-900">
                Atualizar Mesa
            </h2>
            <p class="text-sm text-amber-700/80 mt-1">Altere as informações de capacidade ou status da mesa selecionada</p>
        </div>   

        <div class="bg-white py-8 px-6 shadow-xl rounded-3xl border-2 border-amber-100/50 sm:px-10">

            <form action="{{ route('mesas.update', $mesa->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="numero_mesa" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Número da Mesa</label>
                    <input type="text" id="numero_mesa" name="numero_mesa" value="{{ old('numero_mesa', $mesa->numero_mesa) }}" required placeholder="Ex: 05, Varanda 2"
                           class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                    @error('numero_mesa')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div>
                    <label for="capacidade" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Capacidade (Pessoas)</label>
                    <input type="number" id="capacidade" name="capacidade" min="1" value="{{ old('capacidade', $mesa->capacidade) }}" required placeholder="Ex: 4"
                           class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                    @error('capacidade')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-1">Status Atual</label>
                    <select id="status" name="status" required
                            class="block w-full rounded-xl border-2 border-orange-100 bg-orange-50/30 px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-100">
                        <option value="disponivel" {{ old('status', $mesa->status) == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                        <option value="ocupada" {{ old('status', $mesa->status) == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
                        <option value="reservada" {{ old('status', $mesa->status) == 'reservada' ? 'selected' : '' }}>Reservada</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <a href="{{ route('mesas.index') }}" class="w-1/2 sm:w-auto">
                        <button type="button" class="w-full inline-flex justify-center rounded-xl bg-gray-100 px-5 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 focus:outline-none transition-colors duration-150">
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-3 text-sm font-bold text-gray-500 shadow-md hover:from-amber-600 hover:to-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-200 transition-all duration-150 transform active:scale-95">
                        Atualizar Mesa
                    </button>
                </div>   
            </form>
        </div>   
    </div>
</main>
@endsection