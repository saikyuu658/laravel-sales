<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

    
    return view('welcome');
});
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');;
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');

    Route::get('/sale', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sale/{id}', [SaleController::class, 'index'])->name('sales.show');
    Route::post('/sale', [SaleController::class, 'store'])->name('sales.store');

 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



