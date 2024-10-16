@extends('app')

<div class="absolute inset-0 flex justify-center items-center">
  

      <form
        
        class="rounded-md border-indigo-600 w-[330px] border-2 px-3 py-6">
         <h2 class="block text-gray-700 font-bold pb-8 text-[25px]">Login</h2>

         <div class="mb-4">
             <label for="email" class="block text-gray-700 font-semibold mb-2">E-mail</label>
             <x-input type="text" id="email" name='email'  placeholder="Digite seu email"/>
         </div>

         <div class="mb-6">
             <label for="password" class="block text-gray-700 font-semibold mb-2">Senha</label>
             <x-input type="password" id="password" name='password'  placeholder="Digite sua senha"/>
         </div>

         <div>
             <x-button text="entrar"/>
         </div>
     </form>
      
</div>
