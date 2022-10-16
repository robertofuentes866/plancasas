<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\privilegio;

class privilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Formulario - Privilegios";
        $viewData['table'] = privilegio::all();
        return view('admin.privilegioForm')->with('data',$viewData);
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
            privilegio::validar($request);
            $privilegio = new privilegio();
            $privilegio->nombre = $request->nombre;
            $privilegio->select = $request->select?1:0;
            $privilegio->insert = $request->insert?1:0;
            $privilegio->update = $request->update?1:0;
            $privilegio->delete = $request->delete?1:0;
            
            $privilegio->save();

            return redirect()->route('admin.privilegioForm.index');
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
        $viewData['title'] = "Editar Privilegio";
        $viewData['privilegios'] = privilegio::findOrFail($id);
       return view('admin.privilegioFormEdit')->with('viewData',$viewData);
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
        privilegio::validar($request);
        $privilegio = privilegio::findOrFail($id);
        $privilegio->setNombre($request->nombre);
        $privilegio->setSelect($request->select?1:0);
        $privilegio->setInsert($request->insert?1:0);
        $privilegio->setUpdate($request->update?1:0);
        $privilegio->setDelete($request->delete?1:0);

        $privilegio->save();
        
        return redirect()->route('admin.privilegioForm.index');
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
            privilegio::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Privilegio NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.privilegioForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        $viewData = [];
        $viewData['title'] = "Formulario - Privilegio";
        $viewData['table'] = privilegio::all();

        return redirect()->route('admin.privilegioForm.index');
    }
}
