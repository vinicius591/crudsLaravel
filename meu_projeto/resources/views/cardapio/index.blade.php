@extends('layouts.app')

@section('content')
<main class="flex-1 p-6 md:p-12 flex items-center justify-center bg-gradient-to-br from-slate-50 to-indigo-50 min-h-screen">
    <div class="w-full max-w-lg mx-auto">

        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-tr from-slate-700 to-indigo-600 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md -rotate-2 hover:rotate-0 transition-transform duration-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                Configurar Mesa
            </h2>
            <p class="text-sm text-indigo-900/70 mt-1">Modifique a identificação, capacidade ou status atual do salão</p>
        </div>   

        <div class="bg-white py-8 px-6 shadow-xl rounded-3xl border-2 border-indigo-100/40 sm:px-10">

            <form action="{{ route('mesas.update', $mesa->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="numero_mesa" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Número da Mesa</label>
                    <input type="number" id="numero_mesa" name="numero_mesa" value="{{ old('numero_mesa', $mesa->numero_mesa) }}" required placeholder="Ex: 12"
                           class="block w-full rounded-xl border-2 border-indigo-50 bg-slate-50/50 px-4 py-3 text-slate-800 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-100">
                    @error('numero_mesa')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div>
                    <label for="capacidade" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Capacidade (Lugares)</label>
                    <input type="number" id="capacidade" name="capacidade" value="{{ old('capacidade', $mesa->capacidade) }}" required placeholder="Ex: 4" min="1"
                           class="block w-full rounded-xl border-2 border-indigo-50 bg-slate-50/50 px-4 py-3 text-slate-800 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-100">
                    @error('capacidade')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Status Operacional</label>
                    <select id="status" name="status" required
                            class="block w-full rounded-xl border-2 border-indigo-50 bg-slate-50/50 px-4 py-3 text-slate-800 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-100">
                        <option value="disponivel" {{ old('status', $mesa->status) == 'disponivel' ? 'selected' : '' }}>🟢 Disponível</option>
                        <option value="ocupada" {{ old('status', $mesa->status) == 'ocupada' ? 'selected' : '' }}>🔴 Ocupada</option>
                        <option value="reservada" {{ old('status', $mesa->status) == 'reservada' ? 'selected' : '' }}>🟡 Reservada</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>   

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <a href="{{ route('mesas.index') }}" class="w-1/2 sm:w-auto">
                        <button type="button" class="w-full inline-flex justify-center rounded-xl bg-slate-100 px-5 py-3 text-sm font-bold text-slate-500 hover:bg-slate-200 focus:outline-none transition-colors duration-150">
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" class="inline-flex justify-center rounded-xl bg-gradient-to-r from-slate-700 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-md hover:from-slate-800 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200 transition-all duration-150 transform active:scale-95">
                        Atualizar Mesa
                    </button>
                </div>   
            </form>
        </div>   
    </div>
</main>
@endsection