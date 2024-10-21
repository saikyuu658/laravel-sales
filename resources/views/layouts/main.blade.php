@extends('app')

<div class="flex relative  ">
    <div class="w-[270px]">
       <x-sidebar/>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-6 relative">
        @yield('content-main')
    </main>
</div>