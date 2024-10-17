@extends('app')

<div class="absolute inset-0 flex justify-center items-center">
  

      <form
        
        class="rounded-md  w-[330px] border-2 px-3 py-6 shadow-md">
         <h2 class="block text-gray-700 font-bold pb-8 text-[25px]">Login</h2>

             <x-input type="text" label="Email" id="email" name='email'  placeholder="Digite seu email"/>

             <x-input type="password" label="Senha" id="password" name='password'  placeholder="Digite sua senha"/>

         <div>
             <x-button text="Entrar"/>
         </div>
     </form>
      
</div>
