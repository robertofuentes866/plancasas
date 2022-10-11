<?php

use App\Http\Controllers\Admin\tipoController;
use App\Http\Controllers\Admin\recursoController;
use App\Http\Controllers\Admin\ofrecimientoController;


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

// llama pagina de inicio de plancasas. Cualquier usuario puede tener acceso.
Route::get('/','App\Http\Controllers\menuController@inicio')->name('menu.inicio');

// prepara datos del menu de formularios.
Route::get('/AdminForms','App\Http\Controllers\Admin\AdminFormsController@index');

// llama al formulario de entrada de datos seleccionado. Solo para administradores.
Route::get('/admin.controlForms','App\Http\Controllers\Admin\AdminFormsController@showForm')->name('admin.controlForms');

// Relacionados al formulario TIPO DE PROPIEDADES.
Route::get('/admin.tipoForm.index','App\Http\Controllers\Admin\tipoController@index')->name('admin.tipoForm.index');

Route::post('/admin.tipoForm.store','App\Http\Controllers\Admin\tipoController@store')->name('admin.tipoForm.store');

Route::get('/{id}/admin.tipoForm.edit','App\Http\Controllers\Admin\tipoController@edit')->name('admin.tipoForm.edit');

Route::put('/{id}/admin.tipoForm.update',[tipoController::class,'update'])->name('admin.tipoForm.update');

Route::delete('/{id}/admin.tipoForm.delete','App\Http\Controllers\Admin\tipoController@destroy')->name('admin.tipoForm.delete');

// Relacionados al formulario RECURSOS.
Route::get('/admin.recursoForm.index','App\Http\Controllers\Admin\recursoController@index')->name('admin.recursoForm.index');

Route::post('/admin.recursoForm.store','App\Http\Controllers\Admin\recursoController@store')->name('admin.recursoForm.store');

Route::get('/{id}/admin.recursoForm.edit','App\Http\Controllers\Admin\recursoController@edit')->name('admin.recursoForm.edit');

Route::put('/{id}/admin.recursoForm.update',[recursoController::class,'update'])->name('admin.recursoForm.update');

Route::delete('/{id}/admin.recursoForm.delete','App\Http\Controllers\Admin\recursoController@destroy')->name('admin.recursoForm.delete');

// Relacionados al formulario OFRECIMIENTOS.
Route::get('/admin.ofrecimientoForm.index','App\Http\Controllers\Admin\ofrecimientoController@index')->name('admin.ofrecimientoForm.index');

Route::post('/admin.ofrecimientoForm.store','App\Http\Controllers\Admin\ofrecimientoController@store')->name('admin.ofrecimientoForm.store');

Route::get('/{id}/admin.ofrecimientoForm.edit','App\Http\Controllers\Admin\ofrecimientoController@edit')->name('admin.ofrecimientoForm.edit');

Route::put('/{id}/admin.ofrecimientoForm.update',[ofrecimientoController::class,'update'])->name('admin.ofrecimientoForm.update');

Route::delete('/{id}/admin.ofrecimientoForm.delete','App\Http\Controllers\Admin\ofrecimientoController@destroy')->name('admin.ofrecimientoForm.delete');

Auth::routes();