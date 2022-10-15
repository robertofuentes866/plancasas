<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ciudad;
use Exception;
use Throwable;

class ciudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Formulario - Ciudades";
        $viewData['table'] = ciudad::all();
        return view('admin.ciudadForm')->with('data',$viewData);
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
            ciudad::validar($request);
            $ciudad = new ciudad;
            $ciudad->ciudad = $request->ciudad;
            $ciudad->save();

            return redirect()->route('admin.ciudadForm.index');
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
        $viewData['title'] = "Editar Ciudad";
        $viewData['ciudades'] = ciudad::findOrFail($id);
       return view('admin.ciudadFormEdit')->with('viewData',$viewData);
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
        ciudad::validar($request);
        $ciudad = ciudad::findOrFail($id);
        $ciudad->setCiudad($request->ciudad);
        $ciudad->save();
        
        return redirect()->route('admin.ciudadForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ciudad::destroy($id);
        $viewData = [];
        $viewData['title'] = "Formulario - Ciudades";
        $viewData['table'] = ciudad::all();

        return redirect()->route('admin.ciudadForm.index');
    }
}
