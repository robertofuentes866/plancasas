<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\duracion;

class duracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $viewData = [];

    protected function viewData(){
        $viewData = [];
        $viewData['title'] = "Formulario - Ciudades";
        $viewData['table'] = duracion::all();
        return $viewData;

    }

    public function index()
    {
        return view('admin.duracionForm')->with('data',$this->viewData());
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
            duracion::validar($request);
            $duracion = new duracion;
            $duracion->duracion = $request->duracion;
            $duracion->save();
            
            return redirect()->route('admin.duracionForm.index');
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
        $viewData['title'] = "Editar Duracion";
        $viewData['duraciones'] = duracion::findOrFail($id);
       return view('admin.duracionFormEdit')->with('viewData',$viewData);
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
        duracion::validar($request);
        $duracion = duracion::findOrFail($id);
        $duracion->setDuracion($request->duracion);
        $duracion->save();
        
        return redirect()->route('admin.duracionForm.index');
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
            duracion::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Duracion NO eliminada por tener relacion con otros datos";
          $data['ruta'] = 'admin.duracionForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       

        return $this->index();
    }
}
