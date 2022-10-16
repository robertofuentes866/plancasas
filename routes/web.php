<?php

use App\Http\Controllers\Admin\tipoController;
use App\Http\Controllers\Admin\recursoController;
use App\Http\Controllers\Admin\ofrecimientoController;
use App\Http\Controllers\Admin\ciudadController;
use App\Http\Controllers\Admin\duracionController;
use App\Http\Controllers\Admin\localizacionController;

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
Route::get('/AdminForms','App\Http\Controllers\Admin\AdminFormsController@index')->name('adminForms');

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

// Relacionados al formulario CIUDADES.
Route::get('/admin.ciudadForm.index','App\Http\Controllers\Admin\ciudadController@index')->name('admin.ciudadForm.index');

Route::post('/admin.ciudadForm.store','App\Http\Controllers\Admin\ciudadController@store')->name('admin.ciudadForm.store');

Route::get('/{id}/admin.ciudadForm.edit','App\Http\Controllers\Admin\ciudadController@edit')->name('admin.ciudadForm.edit');

Route::put('/{id}/admin.ciudadForm.update',[ciudadController::class,'update'])->name('admin.ciudadForm.update');

Route::delete('/{id}/admin.ciudadForm.delete','App\Http\Controllers\Admin\ciudadController@destroy')->name('admin.ciudadForm.delete');

// Relacionados al formulario LOCALIZACIONES.
Route::get('/admin.localizacionForm.index','App\Http\Controllers\Admin\localizacionController@index')->name('admin.localizacionForm.index');

Route::post('/admin.localizacionForm.store','App\Http\Controllers\Admin\localizacionController@store')->name('admin.localizacionForm.store');

Route::get('/{id}/admin.localizacionForm.edit','App\Http\Controllers\Admin\localizacionController@edit')->name('admin.localizacionForm.edit');

Route::put('/{id}/admin.localizacionForm.update',[localizacionController::class,'update'])->name('admin.localizacionForm.update');

Route::delete('/{id}/admin.localizacionForm.delete','App\Http\Controllers\Admin\localizacionController@destroy')->name('admin.localizacionForm.delete');

// Relacionados al formulario DURACIONES.
Route::get('/admin.duracionForm.index','App\Http\Controllers\Admin\duracionController@index')->name('admin.duracionForm.index');

Route::post('/admin.duracionForm.store','App\Http\Controllers\Admin\duracionController@store')->name('admin.duracionForm.store');

Route::get('/{id}/admin.duracionForm.edit','App\Http\Controllers\Admin\duracionController@edit')->name('admin.duracionForm.edit');

Route::put('/{id}/admin.duracionForm.update',[duracionController::class,'update'])->name('admin.duracionForm.update');

Route::delete('/{id}/admin.duracionForm.delete','App\Http\Controllers\Admin\duracionController@destroy')->name('admin.duracionForm.delete');

// Relacionados al formulario PRIVILEGIOS.
Route::get('/admin.privilegioForm.index','App\Http\Controllers\Admin\privilegioController@index')->name('admin.privilegioForm.index');

Route::post('/admin.privilegioForm.store','App\Http\Controllers\Admin\privilegioController@store')->name('admin.privilegioForm.store');

Route::get('/{id}/admin.privilegioForm.edit','App\Http\Controllers\Admin\privilegioController@edit')->name('admin.privilegioForm.edit');

Route::put('/{id}/admin.privilegioForm.update','App\Http\Controllers\Admin\privilegioController@update')->name('admin.privilegioForm.update');

Route::delete('/{id}/admin.privilegioForm.delete','App\Http\Controllers\Admin\privilegioController@destroy')->name('admin.privilegioForm.delete');

// Relacionados al formulario AGENTES.
Route::get('/admin.agenteForm.index','App\Http\Controllers\Admin\agenteController@index')->name('admin.agenteForm.index');

Route::post('/admin.agenteForm.store','App\Http\Controllers\Admin\agenteController@store')->name('admin.agenteForm.store');

Route::get('/{id}/admin.agenteForm.edit','App\Http\Controllers\Admin\agenteController@edit')->name('admin.agenteForm.edit');

Route::put('/{id}/admin.agenteForm.update','App\Http\Controllers\Admin\agenteController@update')->name('admin.agenteForm.update');

Route::delete('/{id}/admin.agenteForm.delete','App\Http\Controllers\Admin\agenteController@destroy')->name('admin.agenteForm.delete');

Auth::routes();