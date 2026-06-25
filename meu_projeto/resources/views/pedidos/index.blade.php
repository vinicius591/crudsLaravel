@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 md:p-8 overflow-y-auto">
        <div class="max-w-5xl mx-auto">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-5 mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl tracking-tight">
                        Módulo de <span class="text-blue-600">Pedidos</span>
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">Gerencie a listagem, itens consumidos e o status dos pedidos das mesas.</p>
                </div>

                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('pedidos.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition duration-150 ease-in-out">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Adicionar Pedido
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700 rounded-r-lg shadow-sm text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Mesa</th>
                                <th class="px-6 py-4">Item / Produto</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                            @forelse($pedidos as $pedido)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-mono text-xs text-gray-400">{{ $pedido->id }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">Mesa {{ $pedido->mesa }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $pedido->item }}</td>
                                <td class="px-6 py-4">
                                    @if($pedido->status === 'pendente')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Pendente
                                        </span>
                                    @elseif($pedido->status === 'em_preparo')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Em Preparo
                                        </span>
                                    @elseif($pedido->status === 'entregue')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Entregue
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ ucfirst($pedido->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('pedidos.edit', $pedido->id) }}">
                                        <button type="button" class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition duration-150">
                                            Atualizar
                                        </button>
                                    </a>

                                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Deseja mesmo excluir este pedido?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 focus:outline-none transition duration-150">
                                            Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Nenhum pedido cadastrado até o momento.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}">
                    <button class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition duration-150 ease-in-out">
                        &larr; Voltar para a Dashboard
                    </button>
                </a>
            </div>
        </div>
    </main>
@endsection