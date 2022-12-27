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

     protected $viewData = [];

     protected function viewData(){
        $viewData = [];
        $viewData['title'] = "Formulario - Ofrecimientos";
        $viewData['table'] = ofrecimiento::all();

        return $viewData;
     }

    public function index()
    {  
        return view('admin.ofrecimientoForm')->with('data',$this->viewData());
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
        try {
            ofrecimiento::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Ofrecimiento NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.ofrecimientoForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        //return $this->index();
        return back();
    }
}
