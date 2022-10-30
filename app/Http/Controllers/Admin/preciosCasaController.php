<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\preciosCasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\duracion;
use App\Models\recurso;
use App\Models\casa;
use App\Models\ofrecimiento;

class preciosCasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $viewData = [];

     private function viewData() {
        $viewData = [];
        $viewData['title'] = "Formulario - Precios Casas";
        $viewData['casas'] = casa::all();
        $viewData['ofrecimientos'] = ofrecimiento::all();
        $viewData['duraciones'] = duracion::all();
        $viewData['recursos'] = recurso::all();
        $viewData['relacion'] = DB::table('precios_casas')
                                    ->join('ofrecimientos','precios_casas.id_ofrecimiento','=','ofrecimientos.id_ofrecimiento')
                                    ->join('duraciones','precios_casas.id_duracion','=','duraciones.id_duracion')
                                    ->join('recursos','precios_casas.id_recurso','=','recursos.id_recurso')
                                    ->join('casas','casas.id_casa','=','precios_casas.id_casa')
                                    ->select('recursos.recurso','ofrecimientos.ofrecimiento','casas.casaNumero','precios_casas.valor',
                                    'duraciones.duracion','precios_casas.id_casa','precios_casas.id_casa','precios_casas.id_ofrecimiento',
                                    'precios_casas.id_duracion','precios_casas.id_recurso')
                                    ->get();
        return $viewData;
     } 
    public function index()
    {
        return view('admin.preciosCasaForm')->with('data',$this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        preciosCasa::validar($request);
        $creationData = $request->only(["id_casa","id_recurso","id_duracion","id_ofrecimiento","valor"]);
        preciosCasa::create($creationData);
        
        return redirect()->route('admin.preciosCasaForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\preciosCasa  $preciosCasa
     * @return \Illuminate\Http\Response
     */
    public function show(preciosCasa $preciosCasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id_casa
     * @param int $id_ofrecimiento
     * @param int $id_duracion
     * @param int $id_recurso
     * @return \Illuminate\Http\Response
     */
    public function edit($id_casa,$id_ofrecimiento,$id_duracion,$id_recurso)
    {
        $viewData = [];
        $viewData['title'] = "Editar Precio Casa";
        $viewData['preciosCasa'] = DB::table('precios_casas','pc')->join('casas','casas.id_casa','=','pc.id_casa')
                                                ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','pc.id_ofrecimiento')
                                                ->join('duraciones','duraciones.id_duracion','=','pc.id_duracion')
                                                ->join('recursos','recursos.id_recurso','=','pc.id_recurso')
                                                ->where([['pc.id_casa','=',$id_casa],['pc.id_ofrecimiento','=',$id_ofrecimiento],
                                                       ['pc.id_duracion','=',$id_duracion],['pc.id_recurso','=',$id_recurso]])
                                                ->select('casas.id_casa','casas.casaNumero','ofrecimientos.id_ofrecimiento','ofrecimientos.ofrecimiento',
                                                         'duraciones.id_duracion','duraciones.duracion','recursos.id_recurso',
                                                         'recursos.recurso','pc.valor')->get();

        return view('admin.preciosCasaFormEdit')->with('data',$viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id_casa
     * @param int $id_ofrecimiento
     * @param int $id_duracion
     * @param int $id_recurso
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_casa,$id_ofrecimiento,$id_duracion,$id_recurso)
    {
        $rowAffected = preciosCasa::where([['id_casa','=',$id_casa],['id_ofrecimiento','=',$id_ofrecimiento],
                            ['id_duracion','=',$id_duracion],['id_recurso','=',$id_recurso]])
                            ->update(['valor'=>$request->valor]);
        
        if (!empty($rowAffected)) {
            return redirect()->route('admin.preciosCasaForm.index');
        } else {
            echo "No se pudo ejecutar el UPDATE";
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id_casa
     * @param int $id_ofrecimiento
     * @param int $id_duracion
     * @param int $id_recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_casa,$id_ofrecimiento,$id_duracion,$id_recurso)
    {
    
        try {
            preciosCasa::where([['id_casa','=',$id_casa],['id_ofrecimiento','=',$id_ofrecimiento],
                               ['id_duracion','=',$id_duracion],['id_recurso','=',$id_recurso]])->delete();
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Precio NO eliminado, inténtelo de nuevo o llame al administrador del sistema.";
          $data['ruta'] = 'admin.preciosCasaForm.index';
          return view('admin.errorPage')->with('data',$data);
       }
       return $this->index();
    }
}
