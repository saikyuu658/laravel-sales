@extends('app')

<div class="absolute inset-0 flex flex-col justify-center items-center">
  
    <h2 class="block text-gray-700 font-bold pb-8 text-[25px]">Bem vindo!</h2>

    <p>Digite seu email para entrar no sistema</p>
      <form class=" w-[330px]  px-3 py-6">

             <x-input type="email" label="Email" id="email" name='email'  placeholder="Digite seu email"/>

         <div class="pt-3">
             <x-button text="Entrar" id="loginBtn"/>
         </div>
     </form>
      
</div>
