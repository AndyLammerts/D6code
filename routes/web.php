<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('orders', 'App\Http\Controllers\OrderController');
Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('stocks', 'App\Http\Controllers\StockController');
Route::resource('stores', 'App\Http\Controllers\StoreController');
Route::resource('address', 'App\Http\Controllers\AddressController');
Route::resource('privilege', 'App\Http\Controllers\PrivilegeController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
