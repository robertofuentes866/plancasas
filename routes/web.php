<?php

use App\Http\Controllers\Admin\tipoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;
use App\Http\Controllers\Admin\AdminFormsController;

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

// llama pagina de inicio de plancasas. Cualquier usuario puede tener acceso.
Route::get('/','App\Http\Controllers\menuController@inicio')->name('menu.inicio');

// prepara datos del menu de formularios.
Route::get('/AdminForms','App\Http\Controllers\Admin\AdminFormsController@index')->middleware('auth');

// llama al formulario de entrada de datos seleccionado. Solo para administradores.
Route::get('/admin.controlForms','App\Http\Controllers\Admin\AdminFormsController@showForm')->name('admin.controlForms');

// llama menu de formularios de entrada de datos a seleccionar. Solo para administradores.
Route::view('admin.adminFormsContents','admin.adminFormsContents')->name('admin.adminFormsContents');

// Relacionados al formulario TIPO DE PROPIEDADES.
Route::get('/admin.tipoForm.index','App\Http\Controllers\Admin\tipoController@index')->name('admin.tipoForm.index');

Route::post('/admin.tipoForm.store','App\Http\Controllers\Admin\tipoController@store')->name('admin.tipoForm.store')->middleware('auth');

Route::get('/{id}/admin.tipoForm.edit','App\Http\Controllers\Admin\tipoController@edit')->name('admin.tipoForm.edit')->middleware('auth');

Route::put('/{id}/admin.tipoForm.update',[tipoController::class,'update'])->name('admin.tipoForm.update')->middleware('auth');

Route::delete('/{id}/admin.tipoForm.delete','App\Http\Controllers\Admin\tipoController@destroy')->name('admin.tipoForm.delete')->middleware('auth');

Auth::routes();