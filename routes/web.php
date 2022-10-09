<?php

use App\Http\Controllers\Admin\tipoController;
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

Route::get('/admin.tipoForm.index','App\Http\Controllers\Admin\tipoController@index')->name('admin.tipoForm.index')->middleware('auth');

Route::post('/admin.tipoForm.store','App\Http\Controllers\Admin\tipoController@store')->name('admin.tipoForm.store')->middleware('auth');

Route::get('/{id}/admin.tipoForm.edit','App\Http\Controllers\Admin\tipoController@edit')->name('admin.tipoForm.edit')->middleware('auth');

Route::put('/{id}/admin.tipoForm.update',[tipoController::class,'update'])->name('admin.tipoForm.update')->middleware('auth');

Route::delete('/{id}/admin.tipoForm.delete','App\Http\Controllers\Admin\tipoController@destroy')->name('admin.tipoForm.delete')->middleware('auth');

Auth::routes();