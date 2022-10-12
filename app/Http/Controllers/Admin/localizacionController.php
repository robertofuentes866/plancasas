<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\localizacion;
use App\Models\ciudad;

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
            $localizacion->residencial = $request->residencial;
            $localizacion->id_ciudad = $request->id_ciudad;
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
       return view('admin.localizacionFormEdit')->with('viewData',$viewData);
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
        $localizacion->setLocalizacion($request->residencial);
        $localizacion->setCiudad($request->id_ciudad);
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
        localizacion::destroy($id);

        $viewData = [];
        $viewData['title'] = "Formulario - Localizaciones";
        $viewData['localizaciones'] = localizacion::all();
        $viewData['ciudades'] = ciudad::all();

        return redirect()->route('admin.tipoForm.index');
    }
}
