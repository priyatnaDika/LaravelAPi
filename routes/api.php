<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'App\Http\Controllers\API\autApi@login');
Route::group(['middleware'=>'auth:sanctum'], function() {

    Route::resource('kategoriApi', App\Http\Controllers\API\kategoriApi::class);
    Route::post('kategoriApi/{id}', 'App\Http\Controllers\API\kategoriApi@update');
    
    Route::resource('gameApi', App\Http\Controllers\API\gameApi::class);
    Route::post('gameApi/{id}', 'App\Http\Controllers\API\gameApi@update');

});