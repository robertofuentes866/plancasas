<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\agente;
use App\Models\privilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class agenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $viewData = [];
       $viewData['title'] = "Formulario - Agentes";
       $viewData['agentes'] = agente::all();
       $viewData['privilegios'] = privilegio::all();
       $viewData['relacion'] = DB::table('agentes')
                                   ->join('privilegios','agentes.id_privilegio','=','privilegios.id_privilegio')
                                   ->select('agentes.id_agente','agentes.nombre',
                                   'agentes.apellidos','agentes.email','agentes.cel1',
                                   'agentes.cel2','agentes.password','agentes.foto_agente')
                                   ->get();

        return view('admin.agenteForm')->with('data',$viewData);
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
        agente::validar($request);
        $agente = new agente();
        $agente->nombre = $request->nombre;
        $agente->apellidos = $request->apellidos;
        $agente->email = $request->email;
        $agente->password = $request->password;
        $agente->cel1 = $request->cel1;
        $agente->cel2 = $request->cel2;
        $agente->id_privilegio = $request->id_privilegio;

        $agente->foto_agente = imagePath($request->foto_agente;
        
        $agente->save();

        return redirect()->route('admin.agenteForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agente  $agente
     * @return \Illuminate\Http\Response
     */
    public function show(agente $agente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agente  $agente
     * @return \Illuminate\Http\Response
     */
    public function edit(agente $agente)
    {
        $viewData = [];
        $viewData['title'] = "Editar Agente";
        $viewData['agentes'] = agente::findOrFail($id);
       return view('admin.agenteFormEdit')->with('viewData',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agente  $agente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agente $agente)
    {
        agente::validar($request);
        $agente = agente::findOrFail($id);
        $agente->setNombre($request->nombre);
        $agente->setApellidos($request->apellidos);
        $agente->setPassword($request->password);
        $agente->setEmail($request->email);
        $agente->setCel1($request->cel1);
        $agente->setCel2($request->cel2);
        $agente->setFotoAgente($request->foto_agente);
        $agente->setIdPrivilegio($request->id_privilegio);

        $agente->save();
        
        return redirect()->route('admin.agenteForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agente  $agente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            agente::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Agente NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.agenteForm.index';
          return view('admin.errorPage')->with('data',$data);
       }       
       $viewData = [];
       $viewData['title'] = "Formulario - Agentes";
       $viewData['agentes'] = agente::all();
       $viewData['privilegios'] = privilegio::all();
       $viewData['relacion'] = DB::table('agentes')
                                   ->join('privilegios','agentes.id_privilegio','=','privilegios.id_privilegio')
                                   ->select('agentes.id_agente','agentes.nombre',
                                   'agentes.apellidos','agentes.email','agentes.cel1',
                                   'agentes.cel2','agentes.password','agentes.foto_agente')
                                   ->get();

        return redirect()->route('admin.agenteForm.index');
    }
}
