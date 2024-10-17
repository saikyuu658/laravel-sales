@extends('layouts.main')

@section('title', 'Clientes')

@section('content-main')
    <div>
        <h1 class="font-bold text-[25px] my-5">Clientes</h1>
        <div class="w-[150px]">
            <x-button text="Novo cliente" id="btnNewClient"/>
        </div>
    </div>

    <div class="bg-white shadow-md rounded mt-6">
        <div class="overflow-y-auto" style="height: 82vh;">
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
                            <x-link link="#" id="detalharClient" text="detalhar" />
                        </td>
                    </tr>
                
                </tbody>
            </table>
        </div>
    </div>
    
@endsection