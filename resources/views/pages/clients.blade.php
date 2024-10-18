@extends('layouts.main')

@section('title', 'Clientes')

@section('content-main')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-[25px] my-4">Clientes</h1>
        <div class="w-[150px]">
            <x-button text="Novo cliente" id="btnModalNewCustomer"/>
        </div>
    </div>

    <div class="bg-white shadow-md rounded mt-2">
        <div class="overflow-y-auto" style="height: 79vh;">
            <table class="min-w-full table-auto rounded-md">
                <!-- Cabeçalho da Tabela -->
                <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                    <tr>
                        <th class="px-4 py-2 text-left" style="border-top-left-radius: 6px">Nome</th>
                        <th class="px-4 py-2 text-left">CPF</th>
                        <th class="px-4 py-2 text-left">E-mail</th>
                        <th class="px-4 py-2 text-left"  style="border-top-right-radius: 6px">Ações</th>
                    </tr>
                </thead>

                <!-- Corpo da Tabela -->
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-4 py-2">{{ $usuario->nome }}</td>
                        <td class="px-4 py-2">{{ $usuario->cpf }}</td>
                        <td class="px-4 py-2">{{ $usuario->email }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('detalhar', $usuario->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Detalhar
                            </a>
                        </td>
                    </tr>
                    @endforeach --}}
                    <tr>
                        <td class="px-4 py-2"> $usuario->nome </td>
                        <td class="px-4 py-2"> $usuario->cpf </td>
                        <td class="px-4 py-2"> $usuario->email </td>
                        <td class="px-4 py-2">
                            <x-link  id="detailsCustomer1" class="linkSelector" text="detalhar" dataId="1" />
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2"> $usuario->nome </td>
                        <td class="px-4 py-2"> $usuario->cpf </td>
                        <td class="px-4 py-2"> $usuario->email </td>
                        <td class="px-4 py-2">
                            <x-link  id="detailsCustomer2" class="linkSelector" text="detalhar" dataId="2" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

    <x-modal title="Novo cliente" id="modalNewCustomer" > 
        <form>
            <x-input type="text" label="Nome" id="nome" name='nome' placeholder="Digite o nome completo"/>         
            <div class="flex  justify-between">
                <x-input type="text" label="CPF" id="cpf" name='cpf' placeholder="Digite o CPF"/>         
                <x-input type="tel" label="Telefone" id="telefone" name='telefone' placeholder="Digite o telefone"/>     
            </div>        
            <x-input type="email" label="Email" id="email" name='email' placeholder="Digite o email"/>         
            <div class="w-[150px]">
                <x-button id="resetPasswordBtn" text="Cadastrar cliente" />
            </div>        
        </form>
    </x-modal>

    <x-modal title="David Pontes Silva" id="modalDetailsCustomer" > 
        <p id="show"></p>

        <div class="flex gap-5 mt-2">
            <x-link  id="deleteCustomer" text="Deletar cliente" style="color: #EF4444" dataId="" />
            <x-link  id="editCustomer" text="Editar cliente" dataId="" />
        </div>
    </x-modal>

    <script>
        const modal = document.getElementById("modalNewCustomer");
        const modalDetals = document.getElementById("modalDetailsCustomer");
        const btn = document.getElementById("btnModalNewCustomer");
    
        btn.onclick = function() {
            modal.style.display = "block";
        }
    
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        var openModalButtons = document.querySelectorAll('.linkSelector');
        openModalButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var customerId = this.getAttribute('data-id');
                const pt = document.getElementById('show');
                pt.innerHTML = customerId;
                modalDetals.style.display='block';
            });
        });

    </script>
@endsection