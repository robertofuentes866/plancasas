<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\recurso;


class recursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Formulario - Recursos";
        $viewData['table'] = recurso::all();
        return view('admin.recursoForm')->with('data',$viewData);
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
        recurso::validar($request);
        $recurso = new recurso;
        $recurso->recurso = $request->recurso;
        $recurso->save();

        return redirect()->route('admin.recursoForm.index');
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
        $viewData['title'] = "Editar Recursos";
        $viewData['recursos'] = recurso::findOrFail($id);
       return view('admin.recursoFormEdit')->with('viewData',$viewData);
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
        recurso::validar($request);
        $tipo = recurso::findOrFail($id);
        $tipo->setRecurso($request->recurso);
        $tipo->save();

        return redirect()->route('admin.recursoForm.index');
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
            recurso::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Recurso NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.recursoForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        $viewData = [];
        $viewData['title'] = "Formulario - Recurso";
        $viewData['table'] = recurso::all();

        return redirect()->route('admin.recursoForm.index');
    }
}
