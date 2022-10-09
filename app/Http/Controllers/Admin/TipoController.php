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
        $viewData['title'] = "Tipos de Propiedades";
        $viewData['tipos'] = tipo::all();
       return view('admin.tipoForm')->with('viewData',$viewData);
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
            $viewData = [];
            $viewData['title'] = "Tipos de Propiedades";
            $viewData['tipos'] = tipo::all();

            $tipo = new tipo;
            $tipo->tipo = $request->tipo;
            $tipo->save();
            return redirect('admin.tipoForm.index')->with('viewData',$viewData);
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

        $viewData = [];
        $viewData['title'] = "Editar Tipo de propiedad";
        
        $tipo = tipo::findOrFail($id);
        $tipo->setTipo($request->tipo);
        $tipo->save();
        $viewData['tipos'] = tipo::all();
        return view('admin.tipoForm')->with('viewData',$viewData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $viewData = [];
            $viewData['title'] = "Tipos de Propiedades";
            $viewData['tipos'] = tipo::all();

            tipo::destroy($id);

            return redirect('admin.tipoForm.index')->with('viewData',$viewData);
        
    }
}
