<?php

use App\Http\Controllers\Admin\tipoController;
use App\Http\Controllers\Admin\recursoController;
use App\Http\Controllers\Admin\ofrecimientoController;
use App\Http\Controllers\Admin\ciudadController;
use App\Http\Controllers\Admin\duracionController;
use App\Http\Controllers\Admin\localizacionController;
use App\Http\Controllers\Admin\subTipoController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\infoPropiedad;

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

/*Route::get('/linkstorage', function () {
   symlink("/home/izukatkgjhzn/realtor_web/storage/app/public", "/home/izukatkgjhzn/public_html/public/storage");
});*/

Route::get('/lixoClass',function(){
    
    $lixov = new app\lixo\lixoClass();
});

Route::get('/infoPropiedad/{to}/{nombreAgente}', function($to,$nombreAgente){
   try {   
     $sendMail = new infoPropiedad($_GET['from'],$_GET['emailBody'],$nombreAgente,$_GET['casaNumero']);
     Mail::to($to)->send($sendMail);
     return redirect()->back();
   } catch (exception $e) {
      return 'Ha ocurrido un error de envio: '. $e->getMessage();
   }
})->name('infoPropiedad'); 

Route::get('/casas-venta-renta/{gestion?}/{id_propiedad?}/{busqueda?}','App\Http\Controllers\menuController@inicio')->name('casas-venta-renta');

Route::get('/residencial/{descripcion}/{id_casa}/{residencial}',
           function($descripcion,$id_casa,$residencial){ 
            return view('layouts.residenciales',['descripcion'=>$descripcion,'id_casa'=>$id_casa,'residencial'=>$residencial]);
         })->name('residencial');

Route::get('/textos_informacion/{texto}','App\Http\Controllers\textos_informacionController@show')->name('textos_informacion');
Route::get('/hagalo-usted-mismo/{texto}','App\Http\Controllers\textos_informacionController@show')->name('hagalo-usted-mismo');

Route::get('/','App\Http\Controllers\menuController@indexacion')->name('menuIndex');

Route::post('loginAdmin','App\Http\Controllers\Auth\loginAdminController@loginAdmin')->name('loginAdm');
Route::get('/loginAdmin','App\Http\Controllers\Auth\loginAdminController@showLoginAdmin');
Route::post('logOutAdmin','App\Http\Controllers\Auth\loginAdminController@logOutAdmin')->name('logOutAdmin');

// prepara datos del menu de formularios.
Route::group(['middleware'=>['autenticado']],function() { 
     
// llama al menu de los formularios.     
Route::get('/AdminForms','App\Http\Controllers\Admin\AdminFormsController@index')->name('adminForms');

// llama al formulario de entrada de datos seleccionado. Solo para administradores.
Route::get('/admin.controlForms','App\Http\Controllers\Admin\AdminFormsController@showForm')->name('admin.controlForms');

// Relacionados al formulario TIPO DE PROPIEDADES.
Route::get('/admin.tipoForm.index','App\Http\Controllers\Admin\tipoController@index')->name('admin.tipoForm.index');

Route::post('/admin.tipoForm.store','App\Http\Controllers\Admin\tipoController@store')->name('admin.tipoForm.store');

Route::get('/{id}/admin.tipoForm.edit','App\Http\Controllers\Admin\tipoController@edit')->name('admin.tipoForm.edit');

Route::put('/{id}/admin.tipoForm.update',[tipoController::class,'update'])->name('admin.tipoForm.update');

Route::delete('/{id}/admin.tipoForm.delete','App\Http\Controllers\Admin\tipoController@destroy')->name('admin.tipoForm.delete');

// Relacionados al formulario SUBTIPO DE PROPIEDADES.
Route::get('/admin.subTipoForm.index','App\Http\Controllers\Admin\subTipoController@index')->name('admin.subTipoForm.index');

Route::post('/admin.subTipoForm.store','App\Http\Controllers\Admin\subTipoController@store')->name('admin.subTipoForm.store');

Route::get('/{id_subtipo}/admin.subTipoForm.edit','App\Http\Controllers\Admin\subTipoController@edit')->name('admin.subTipoForm.edit');

Route::put('/{id_subtipo}/admin.subTipoForm.update',[subTipoController::class,'update'])->name('admin.subTipoForm.update');

Route::delete('/{id_subtipo}/admin.subTipoForm.delete','App\Http\Controllers\Admin\subTipoController@destroy')->name('admin.subTipoForm.delete');

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

Route::get('{id}/admin.agenteForm.edit','App\Http\Controllers\Admin\agenteController@edit')->name('admin.agenteForm.edit');

Route::put('/{id}/admin.agenteForm.update','App\Http\Controllers\Admin\agenteController@update')->name('admin.agenteForm.update');

Route::delete('/{id}/admin.agenteForm.delete','App\Http\Controllers\Admin\agenteController@destroy')->name('admin.agenteForm.delete');

// Relacionados al formulario CASAS.
Route::get('/admin.casaForm.index','App\Http\Controllers\Admin\casaController@index')->name('admin.casaForm.index');

Route::post('/admin.casaForm.store','App\Http\Controllers\Admin\casaController@store')->name('admin.casaForm.store');

Route::get('/{id}/admin.casaForm.edit','App\Http\Controllers\Admin\casaController@edit')->name('admin.casaForm.edit');

Route::put('/{id}/admin.casaForm.update','App\Http\Controllers\Admin\casaController@update')->name('admin.casaForm.update');

Route::delete('/{id}/admin.casaForm.delete','App\Http\Controllers\Admin\casaController@destroy')->name('admin.casaForm.delete');

// Relacionados al formulario FOTOS CASA.
Route::get('/admin.fotosCasaForm.index','App\Http\Controllers\Admin\fotosCasaController@index')->name('admin.fotosCasaForm.index');

Route::post('/admin.fotosCasaForm.store','App\Http\Controllers\Admin\fotosCasaController@store')->name('admin.fotosCasaForm.store');

Route::get('/{id}/admin.fotosCasaForm.edit','App\Http\Controllers\Admin\fotosCasaController@edit')->name('admin.fotosCasaForm.edit');

Route::put('/{id}/admin.fotosCasaForm.update','App\Http\Controllers\Admin\fotosCasaController@update')->name('admin.fotosCasaForm.update');

Route::delete('/{id}/admin.fotosCasaForm.delete','App\Http\Controllers\Admin\fotosCasaController@destroy')->name('admin.fotosCasaForm.delete');

// Relacionados al formulario PRECIOS CASA.
Route::get('/admin.preciosCasaForm.index','App\Http\Controllers\Admin\preciosCasaController@index')->name('admin.preciosCasaForm.index');

Route::post('/admin.preciosCasaForm.store','App\Http\Controllers\Admin\preciosCasaController@store')->name('admin.preciosCasaForm.store');

Route::get('/id_casa/{id_casa}/id_ofrecimiento/{id_ofrecimiento}/id_duracion/{id_duracion}/id_recurso/{id_recurso}/casaNumero/{casaNumero}','App\Http\Controllers\Admin\preciosCasaController@edit')->name('admin.preciosCasaForm.edit');

Route::put('/id_casa/{id_casa}/id_ofrecimiento/{id_ofrecimiento}/id_duracion/{id_duracion}/id_recurso/{id_recurso}','App\Http\Controllers\Admin\preciosCasaController@update')->name('admin.preciosCasaForm.update');

Route::delete('/id_casa/{id_casa}/id_ofrecimiento/{id_ofrecimiento}/id_duracion/{id_duracion}/id_recurso/{id_recurso}','App\Http\Controllers\Admin\preciosCasaController@destroy')->name('admin.preciosCasaForm.delete');

}); // End grupo middleware autenticado.

Auth::routes();