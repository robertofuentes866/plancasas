<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
        $viewData = [];
        $viewData['title'] = "Formulario - Tipos de propiedades";
        $viewData['table'] = tipo::all();
        return view('admin.tipoForm')->with('data',$viewData);
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
            tipo::validar($request);
            $tipo = new tipo;
            $tipo->tipo = $request->tipo;
            $tipo->save();

            return redirect()->route('admin.tipoForm.index');
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
        $viewData['title'] = "Editar Tipo de propiedad";
        $viewData['tipos'] = tipo::findOrFail($id);
       return view('admin.tipoFormEdit')->with('viewData',$viewData);
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
        tipo::validar($request);
        $tipo = tipo::findOrFail($id);
        $tipo->setTipo($request->tipo);
        $tipo->save();
        
        return redirect()->route('admin.tipoForm.index');
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
            tipo::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Tipo NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.tipoForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        $viewData = [];
        $viewData['title'] = "Formulario - Tipo";
        $viewData['table'] = tipo::all();

        return redirect()->route('admin.tipoForm.index');
    }
}
