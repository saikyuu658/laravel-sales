<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts/login');
});

Route::get('/clients', function () {
    return view('pages.clients');
})->name('clients');

Route::get('/produts', function () {
    return view('pages.produts');
})->name('produts');

Route::get('/vendas', function () {
    return view('pages.vendas');
})->name('vendas');

Route::get('/perfil', function () {
    return view('pages.perfil');
})->name('perfil');