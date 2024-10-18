@extends('app')

<div class="flex relative  ">
    <div class="w-[270px]">
        <nav 
        id="sidebar" 
        class=" border-r-gray-400 bg-gray-100 border-r-2 text-gray-800 min-h-screen w-[270px] top-0 left-0 bottom-0 fixed">
            <div class="mx-3 my-2">
                <p class="text-md font-bold">David Pontes Silva</p>
                <p class="text-sm  ">davidpontes461@gmail.com</p>
            </div>
            <ul class="flex flex-col space-y-4 mt-8">
                <li class="group hover:bg-white hover:text-black  mx-3 rounded-md p-2  {{ Route::currentRouteName() === 'vendas' ? 'bg-gray-200 text-black' : '' }}">
                    <a href="{{ route('vendas') }}" class="flex items-center px-4 py-2 ">
                        <span class="material-symbols-outlined hover:text-black">point_of_sale</span>
                        <span class="ml-4  font-semibold">Vendas</span>
                    </a>
                </li>
                <li class="group group hover:bg-white hover:text-black  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'clients' ? 'bg-gray-200 text-black' : '' }}">
                    <a href="{{ route('clients') }}" class="flex items-center px-4 py-2">
                        <span class="material-symbols-outlined hover:text-black">groups</span>
                        <span class="ml-4  font-semibold">Clientes</span>
                    </a>
                </li>
                <li class="group group hover:bg-white hover:text-black  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'produts' ? 'bg-gray-200 text-black' : '' }}">
                    <a href="{{ route('produts') }}" class="flex items-center px-4 py-2">
                        <span class="material-symbols-outlined hover:text-black ">inventory</span>
                        <span class="ml-4 font-semibold">Produtos</span>
                    </a>
                </li>
                <li class="group group hover:bg-white hover:text-black mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'perfil' ? 'bg-gray-200 text-black' : '' }}">
                    <a href="{{ route('perfil') }}" class="flex items-center px-4 py-2">
                        <span class="material-symbols-outlined hover:text-black">account_circle</span>
                        <span class="ml-4 font-semibold">Perfil</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-6 relative">
        @yield('content-main')
    </main>
</div>