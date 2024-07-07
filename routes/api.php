<?php

use Nette\Utils\Json;
use App\Models\localizacion;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::get('residencial/{id1}',function($id1){
    $localizacion = localizacion::findOrFail($id1);
    $rutaImagenes = 'storage/residenciales/'.strtolower($localizacion->residencial);
    $localizacion = array("data"=>$localizacion,"ruta"=>$rutaImagenes);
    return response()->json($localizacion,200);
});
