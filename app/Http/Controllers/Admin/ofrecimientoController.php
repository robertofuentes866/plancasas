<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ofrecimiento;

class ofrecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Formulario - Ofrecimientos";
        $viewData['table'] = ofrecimiento::all();
        return view('admin.ofrecimientoForm')->with('data',$viewData);
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
        ofrecimiento::validar($request);
        $ofrecimiento = new ofrecimiento();
        $ofrecimiento->ofrecimiento = $request->ofrecimiento;
        $ofrecimiento->save();

        return redirect()->route('admin.ofrecimientoForm.index');
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
        $viewData['title'] = "Editar Ofrecimiento";
        $viewData['ofrecimientos'] = ofrecimiento::findOrFail($id);
       return view('admin.ofrecimientoFormEdit')->with('viewData',$viewData);
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
        ofrecimiento::validar($request);
        $ofrecimiento = ofrecimiento::findOrFail($id);
        $ofrecimiento->setOfrecimiento($request->ofrecimiento);
        $ofrecimiento->save();

        return redirect()->route('admin.ofrecimientoForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ofrecimiento::destroy($id);
        $viewData = [];
        $viewData['title'] = "Ofrecimientos";
        $viewData['table'] = ofrecimiento::all();
        return redirect()->route('admin.ofrecimientoForm.index');
    }
}
