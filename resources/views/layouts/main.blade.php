@extends('app')

<div class="flex">
    <!-- Sidebar -->
    <nav 
        id="sidebar" 
        class="sidebar bg-indigo-600 h-screen text-white w-[270px]">
        
        <ul class="flex flex-col space-y-4 mt-8">
            <li class="group hover:bg-white hover:text-indigo-700  mx-3 rounded-md p-2  {{ Route::currentRouteName() === 'vendas' ? 'bg-indigo-950 text-white' : '' }}">
                <a href="{{ route('vendas') }}" class="flex items-center px-4 py-2 ">
                    <span class="material-symbols-outlined hover:text-indigo-700">point_of_sale</span>
                    <span class="ml-4  font-semibold">Vendas</span>
                </a>
            </li>
            <li class="group group hover:bg-white hover:text-indigo-700  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'clients' ? 'bg-indigo-950 text-white' : '' }}">
                <a href="{{ route('clients') }}" class="flex items-center px-4 py-2">
                    <span class="material-symbols-outlined hover:text-indigo-700">groups</span>
                    <span class="ml-4  font-semibold">Clientes</span>
                </a>
            </li>
            <li class="group group hover:bg-white hover:text-indigo-700  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'produts' ? 'bg-indigo-950 text-white' : '' }}">
                <a href="{{ route('produts') }}" class="flex items-center px-4 py-2">
                    <span class="material-symbols-outlined hover:text-indigo-700 ">inventory</span>
                    <span class="ml-4 font-semibold">Produtos</span>
                </a>
            </li>
            <li class="group group hover:bg-white hover:text-indigo-700  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'perfil' ? 'bg-indigo-950 text-white' : '' }}">
                <a href="{{ route('perfil') }}" class="flex items-center px-4 py-2">
                    <span class="material-symbols-outlined hover:text-indigo-700 ">account_circle</span>
                    <span class="ml-4 font-semibold">Perfil</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content-main')
    </main>
</div>