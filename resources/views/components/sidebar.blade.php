<nav 
id="sidebar" 
class=" border-r-gray-400 bg-gray-100 border-r-2 text-gray-800 min-h-screen w-[270px] top-0 left-0 bottom-0 fixed">
    
    <ul class="flex flex-col space-y-4 mt-8">
        <li class="group hover:bg-white hover:text-black  mx-3 rounded-md p-2  {{ Route::currentRouteName() === 'sales.index' ? 'bg-gray-200 text-black' : '' }}">
            <a href="/sale" class="flex items-center px-4 py-2 ">
                <span class="material-symbols-outlined hover:text-black">point_of_sale</span>
                <span class="ml-4  font-semibold">Vendas</span>
            </a>
        </li>
          <li class="group group hover:bg-white hover:text-black  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'customer.index' ? 'bg-gray-200 text-black' : '' }}">
            <a href="/customers" class="flex items-center px-4 py-2">
                <span class="material-symbols-outlined hover:text-black">groups</span>
                <span class="ml-4  font-semibold">Clientes</span>
            </a>
        </li>
        <li class="group group hover:bg-white hover:text-black  mx-3 rounded-md p-2 {{ Route::currentRouteName() === 'products.index' ? 'bg-gray-200 text-black' : '' }}">
            <a href="/products" class="flex items-center px-4 py-2">
                <span class="material-symbols-outlined hover:text-black ">inventory</span>
                <span class="ml-4 font-semibold">Produtos</span>
            </a>
        </li>
        <li class="group group hover:bg-white hover:text-black mx-3 rounded-md p-2 {{ Route::currentRouteName() == 'profile.edit' ? 'bg-gray-200 text-black' : '' }}">
            <a href="/profile" class="flex items-center px-4 py-2">
                <span class="material-symbols-outlined hover:text-black">account_circle</span>
                <span class="ml-4 font-semibold">Perfil</span>
            </a>
        </li>
        <li class="group group hover:bg-white hover:text-black mx-3 rounded-md p-2">
            <a href="/logout" class="flex items-center px-4 py-2">
                <span class="material-symbols-outlined hover:text-black">logout</span>
                <span class="ml-4 font-semibold">Sair</span>
            </a>
        </li>
    </ul>
</nav>