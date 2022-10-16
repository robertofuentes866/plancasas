<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\localizacion;
use App\Models\ciudad;
use Illuminate\Support\Facades\DB;

class localizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $viewData = [];
        $viewData['title'] = "Formulario - Localizaciones";
        $viewData['localizaciones'] = localizacion::all();
        $viewData['ciudades'] = ciudad::all();
        $viewData['relacion'] = DB::table('localizaciones')
                                    ->join('ciudades','localizaciones.id_ciudad','=','ciudades.id_ciudad')
                                    ->select('localizaciones.id_localizacion','localizaciones.residencial',
                                    'localizaciones.direccion','ciudades.ciudad')
                                    ->get();
        //print_r($viewData['relacion']);
        return view('admin.localizacionForm')->with('data',$viewData);
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
            localizacion::validar($request);
            $localizacion = new localizacion;
            $localizacion->id_ciudad = $request->id_ciudad;
            $localizacion->residencial = $request->residencial;
            $localizacion->direccion = $request->direccion;
           
            $localizacion->save();

            return redirect()->route('admin.localizacionForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Editar Localizacion";
        $viewData['localizaciones'] = localizacion::findOrFail($id);
        $viewData['ciudades'] = ciudad::all();
       return view('admin.localizacionFormEdit')->with('data',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        localizacion::validar($request);
        $localizacion = localizacion::findOrFail($id);
        $localizacion->setResidencial($request->residencial);
        $localizacion->setIdCiudad($request->id_ciudad);
        $localizacion->setDireccion($request->direccion);
        $localizacion->save();
        
        return redirect()->route('admin.localizacionForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            localizacion::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Localizacion NO eliminada por tener relacion con otros datos";
          $data['ruta'] = 'admin.localizacionForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        $viewData = [];
        $viewData['title'] = "Formulario - Localizaciones";
        $viewData['localizaciones'] = localizacion::all();
        $viewData['ciudades'] = ciudad::all();
        $viewData['relacion'] = DB::table('localizaciones')
                                    ->join('ciudades','localizaciones.id_ciudad','=','ciudades.id_ciudad')
                                    ->select('localizaciones.id_localizacion','localizaciones.residencial',
                                    'localizaciones.direccion','ciudades.ciudad')
                                    ->get();

        return redirect()->route('admin.localizacionForm.index');
    }
}
