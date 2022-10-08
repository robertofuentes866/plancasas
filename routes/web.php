<?php

use App\Http\Controllers\casaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

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

Route::get('/','App\Http\Controllers\menuController@inicio')->name('menu.inicio');

Auth::routes();

Route::get('/lixo',function(){ echo "hola";})->middleware(['auth','edad']);

Route::get('/no-autorizado',function(){ echo "Usuario no autorizado";});
