@extends('layouts.main')

@section('title', 'Perfil')

@section('content-main')
    <h1 class="font-bold text-[25px]">Perfil</h1>
    <form action="" class="w-[350px] mt-16" >
        <x-input type="email" label="Email"  id="email" name='email' placeholder="Digite seu email"/>
        <x-input type="text" label="Nome"  id="nome" name='nome' placeholder="Digite seu nome" />
        <x-link id="openModalLink" text="Resetar senha"/>
        <div  class="w-[100px] my-4">
            <x-button text="Salvar" id="saveChange"/>
        </div>
    </form>

    <div class="absolute right-5 top-5">
        
    </div>


    <x-modal title="titulo do modal" id="modalTeste" > 
        <h3>Testes</h3>
    </x-modal>
    

    <script>
        const modal = document.getElementById("modalTeste");
        const btn = document.getElementById("openModalLink");
    
        btn.onclick = function() {
            modal.style.display = "block";
        }
    
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection