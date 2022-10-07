<?php

use App\Http\Controllers\casaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/menu.crearUsuario','App\Http\Controllers\menuController@crearUsuario')->name('menu.crearUsuario');
Route::get('/menu.iniciarSesion','App\Http\Controllers\menuController@iniciarSesion')->name('menu.iniciarSesion');
Route::get('/menu.cerrarSesion','App\Http\Controllers\menuController@cerrarSesion')->name('menu.cerrarSesion');

Route::view('/lixo',"lixo.lixo");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
