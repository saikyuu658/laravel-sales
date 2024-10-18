@extends('layouts.main')

@section('title', 'Produtos')

@section('content-main')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-[25px] my-4">Produtos</h1>
        <div class="w-[150px]">
            <x-button text="Novo produto" id="btnNewProdut" />
        </div>
    </div>

    <div class="bg-white shadow-md rounded mt-2">
        <div class="overflow-y-auto" style="height: 79vh;">
            <table class="min-w-full table-auto rounded-md">
                <!-- Cabeçalho da Tabela -->
                <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                    <tr>
                        <th class="px-4 py-2 text-left" style="border-top-left-radius: 6px">Nome</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                        <th class="px-4 py-2 text-left">Valor</th>
                        <th class="px-4 py-2 text-left">Qtd</th>
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
                        <td class="px-4 py-2"> $usuario->descrição </td>
                        <td class="px-4 py-2"> $usuario->valor </td>
                        <td class="px-4 py-2"> $usuario->qtd </td>
                        <td class="px-4 py-2">
                            <x-link link="#" id="detalsProduts" text="detalhar" dataId="2"  />
                        </td>
                    </tr>
                
                </tbody>
            </table>
        </div>
    </div>

<script> 

    function showmodal(){
        alert('ahh')
    }
</script>
@endsection