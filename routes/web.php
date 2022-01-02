<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\OrderController;
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
    return redirect()->route('home');
});
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('is_admin');
Route::get('kategoriMicro', 'App\Http\Controllers\KategoriController@micro');
Route::resource('game', App\Http\Controllers\GameController::class)->middleware('is_admin');
Route::resource('order', App\Http\Controllers\OrderController::class)->middleware('is_admin');