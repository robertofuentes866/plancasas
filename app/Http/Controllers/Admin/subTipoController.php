<?php

namespace App\Http\Controllers\Admin;

use App\Models\tipo;
use App\Models\subtipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class subTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $viewData = [];

    protected function viewData() {
       $viewData = [];
       $viewData['title'] = "Formulario - Sub-Tipos de propiedades";
       $viewData['tipos'] = tipo::all();
       $viewData['relacion'] = DB::table('subtipos')->join('tipos','tipos.id_tipo','=','subtipos.id_tipo')
                               ->select('tipos.tipo','subtipos.subtipo','subtipos.id_tipo',
                               'subtipos.id_subtipo')->get();
       return $viewData;
    }

   public function index()
   { 
       return view('admin.subTipoForm')->with('data',$this->viewData());
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
        subtipo::validar($request);
        $subtipo = new subtipo;
        $subtipo->id_tipo = $request->id_tipo;
        $subtipo->subtipo = $request->subtipo;
        $subtipo->save();

        return redirect()->route('admin.subTipoForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subtipo  $subtipo
     * @return \Illuminate\Http\Response
     */
    public function show(subtipo $subtipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id_subtipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id_subtipo)
    {
        $viewData = [];
        $viewData['title'] = "Editar Sub-Tipo de propiedad";
        $viewData['subtipos'] = subtipo::find($id_subtipo);                               
       return view('admin.subtipoFormEdit')->with('data',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param int $id_subtipo
     *  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_subtipo)
    {
        subtipo::validar($request);
        $subtipo = subtipo::find($id_subtipo);
        $subtipo->setSubTipo($request->subtipo);
        $subtipo->save();

        return redirect()->route('admin.subTipoForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id_subtipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_subtipo)
    {
        try {
            subtipo::destroy($id_subtipo);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Recurso NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.subTipoForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
        return $this->index();
    }
}
