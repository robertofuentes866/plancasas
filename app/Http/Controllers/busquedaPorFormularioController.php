<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class busquedaPorFormularioController extends Controller
{
    protected $respuesta = [];
    protected $viewData = [];

    public function index(Request $request) {
        $this->viewData['titulo'] = "Respuesta a su busqueda";
        $this->viewData['nav_link_inicio'] = "nav-link active";
        $this->viewData['nav_link_registrar'] = "nav-link";
        $this->viewData['nav_link_entrar'] = "nav-link";

        $this->respuesta = DB::table('casas')
                     ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                     ->join('ciudades','ciudades.id_ciudad','=','localizaciones.id_ciudad')
                     ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                     ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                     ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                     ->where([['precios_casas.id_ofrecimiento','=',$request->id_ofrecimiento],
                             ['localizaciones.id_ciudad','=',$request->id_ciudad],
                              ['localizaciones.id_localizacion','=',$request->id_localizacion],
                            ['fotos_casas.es_principal','=',1],
                            ['casas.disponibilidad','=',1]])
                     ->select('casas.casaNumero','ciudades.ciudad','localizaciones.residencial','fotos_casas.foto_thumb',
                                'fotos_casas.foto_normal','localizaciones.descripcion')
                     ->groupBy('casas.casaNumero')->get();
        
        return view('layouts/busquedaPorFormulario',['imagenes_casas'=>$this->respuesta,'viewData'=>$this->viewData,'req'=>$request->id_ciudad]);
    }
}
