@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-slate-50 font-sans antialiased">
    
    <aside class="w-64 bg-white border-r border-slate-200 min-h-screen flex-shrink-0 flex flex-col justify-between hidden md:flex shadow-sm">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-100 bg-slate-900">
                <div class="flex items-center space-x-2">
                    <div class="w-7 h-7 bg-indigo-500 rounded-lg flex items-center justify-center text-white font-black text-sm">LN</div>
                    <span class="text-base font-bold text-white tracking-wide">Gerenciador LN</span>
                </div>
            </div>

            <nav class="p-4 space-y-1.5">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}">
                    <svg class="w-5 h-5 mr-3 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ url('/cardapios') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-200 {{ request()->is('cardapios*') ? 'bg-orange-50 text-orange-700 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}">
                    <svg class="w-5 h-5 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Cardápio
                </a>

                <a href="{{ url('/mesas') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-200 {{ request()->is('mesas*') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}">
                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                    </svg>
                    Mesas
                </a>

                <a href="{{ url('/pedidos') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition duration-200 {{ request()->is('pedidos*') ? 'bg-rose-50 text-rose-700 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}">
                    <svg class="w-5 h-5 mr-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    Pedidos
                </a>
            </nav>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <header class="bg-white border-b border-slate-200 h-16 flex items-center px-6 md:px-8 justify-between z-10 shadow-xs">
            <h2 class="font-bold text-lg text-slate-800 tracking-tight">
                {{ __('Dashboard') }}
            </h2>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            <div class="max-w-5xl mx-auto space-y-8">
                
                <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-xs relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-indigo-50 rounded-full blur-2xl opacity-70 pointer-events-none"></div>
                    <h1 class="text-2xl font-extrabold text-slate-900 sm:text-3xl tracking-tight">
                        Seja bem-vindo(a), <span class="text-indigo-600">{{ Auth::user()->name }}</span>!
                    </h1>
                    <p class="mt-1.5 text-sm text-slate-500">Painel operacional centralizado do Sistema Gerenciador LN.</p>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-6">
                    <a href="{{ url('/cardapios') }}" class="group bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:border-orange-500 hover:-translate-y-1 hover:shadow-md transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="w-11 h-11 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition duration-300 mb-5 shadow-xs">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-1.5">Cardápio</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Configure os pratos ativos, preços e controle de estoque de forma dinâmica.</p>
                        </div>
                        <div class="mt-6 text-sm font-semibold text-orange-600 group-hover:text-orange-700 flex items-center">
                            <span>Acessar módulo</span>
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ url('/mesas') }}" class="group bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:border-indigo-500 hover:-translate-y-1 hover:shadow-md transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="w-11 h-11 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition duration-300 mb-5 shadow-xs">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-1.5">Mesas</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Gerencie o mapa de mesas do salão, capacidades e status de ocupação.</p>
                        </div>
                        <div class="mt-6 text-sm font-semibold text-indigo-600 group-hover:text-indigo-700 flex items-center">
                            <span>Acessar módulo</span>
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ url('/pedidos') }}" class="group bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:border-rose-500 hover:-translate-y-1 hover:shadow-md transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="w-11 h-11 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition duration-300 mb-5 shadow-xs">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-1.5">Pedidos</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">Monitore as comandas enviadas para a cozinha e o fluxo de preparo em tempo real.</p>
                        </div>
                        <div class="mt-6 text-sm font-semibold text-rose-600 group-hover:text-rose-700 flex items-center">
                            <span>Acessar módulo</span>
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </a>

                </div>

            </div>
        </main>
    </div>
</div>
@endsection