<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/product/stock', [ProductController::class, 'updateStock'])->name('product.updateStock')
    ->middleware('auth');
Route::get('/product/showPropierties/{id}', [ProductController::class, 'showPropierties'])->name('product.showPropierties');
Route::resource('/product', ProductController::class); //para acceder a todos lo metodos

//Users
Route::resource('/users', '\App\Http\Controllers\UserController')
    ->except('create', 'store')
    ->names('users')->middleware('can:admin.index'); //para acceder a todos lo metodos

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
