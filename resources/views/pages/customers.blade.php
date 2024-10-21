@extends('layouts.main')

@section('title', 'Clientes')

@section('content-main')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-[25px] my-4">Clientes</h1>
        {{-- <div class="w-[150px]">
            <x-button text="Novo cliente" id="btnModalNewCustomer"/>
        </div> --}}
    </div>

    <div class="bg-white shadow-md rounded mt-2">
        <div class="overflow-y-auto" style="height: 79vh;">
            @if($customers->isEmpty())
                <div class="justify-center items-center text-center font-bold text-gray-600 text-[30px]">
                    <p class="text-center font-bold text-gray-600 text-[30px] mt-[20%]">Nenhum registro encontrado</p>
                </div>
            @else 
                <table class="min-w-full table-auto rounded-md">
                    <!-- Cabeçalho da Tabela -->
                    <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                        <tr>
                            <th class="px-4 py-2 text-left" style="border-top-left-radius: 6px">Nome</th>
                            <th class="px-4 py-2 text-left">CPF</th>
                            <th class="px-4 py-2 text-left">E-mail</th>
                            <th class="px-4 py-2 text-left">Telefone</th>
                            <th class="px-4 py-2 text-left"  style="border-top-right-radius: 6px">Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da Tabela -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        @foreach($customers as $customer)

                            <tr>
                                <td class="px-4 py-2"> {{$customer->name}} </td>
                                <td class="px-4 py-2"> {{$customer->cpf}} </td>
                                <td class="px-4 py-2"> {{$customer->email}} </td>
                                <td class="px-4 py-2"> {{$customer->phone}} </td>
                                <td class="px-4 py-2">
                                    <x-link  id="detailsCustomer1" class="linkSelector" text="Editar" dataId="{{$customer->id}}" />
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    
    <x-myModal title="Editar Cliente" id="modalDetailsCustomer" > 
        <form class="py-3" id="formEdit" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-input type="text" label="Nome" id="customerName" name='name'  placeholder="Digite o nome completo" />
            <div class="flex justify-between">
                <x-input type="text" label="CPF" id="customerCpf" name='cpf' placeholder="Digite o CPF" />
                <x-input type="telefone" label="Telefone" id="customerPhone" name='phone' placeholder="Digite o telefone" />
            </div>
            <x-input type="email" label="email" id="customerEmail" name='email'  placeholder="Digite o email" />

            <x-button text="Salvar alteração" id="saveEdit"/>
        </form>
        
    </x-myModal>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert($error)
            </script>
        @endforeach
    @endif


    <script>
        const modal = document.getElementById("modalNewCustomer");
        const modalDetals = document.getElementById("modalDetailsCustomer");
    

        var openModalButtons = document.querySelectorAll('.linkSelector');
        openModalButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var customId = this.getAttribute('data-id');
                const baseUpdateRoute = "{{ route('customer.update', ':id') }}";
                const updateRoute = baseUpdateRoute.replace(':id', customId);
                document.getElementById('formEdit').action = updateRoute

                fetch('/customers/' + customId)
                    .then(response => response.json())
                    .then(customers => {
                        
                            document.getElementById('customerName').value = customers.name;
                            document.getElementById('customerCpf').value = customers.cpf;
                            document.getElementById('customerEmail').value = customers.email;
                            document.getElementById('customerPhone').value = customers.phone;
                        modalDetals.style.display='block'

                    })
                    .catch(error => console.error('Erro ao carregar os dados do cliente:', error));
                modalDetals.style.display='block';
            });
        });

    </script>
@endsection