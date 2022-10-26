<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\agente;
use App\Models\privilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class agenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $viewData = [];

    protected function viewData() { // solamente llamado de los metodos index y destroy.
        
        $viewData = [];
        $viewData['title'] = "Formulario - Agentes";
        $viewData['agentes'] = agente::all();
        $viewData['privilegios'] = privilegio::all();
        $viewData['relacion'] = DB::table('agentes')
                                    ->join('privilegios','agentes.id_privilegio','=','privilegios.id_privilegio')
                                    ->select('agentes.id_agente','privilegios.nombre as privilegio','agentes.nombre',
                                    'agentes.apellidos','agentes.email','agentes.cel1',
                                    'agentes.cel2','agentes.password','agentes.foto_agente')
                                    ->get();
        return $viewData;
    }

    public function index()
    {
        return view('admin.agenteForm')->with('data',$this->viewData());
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
        $agente->password = hash::make($request->password);
        $agente->cel1 = $request->cel1;
        $agente->cel2 = $request->cel2;
        $agente->id_privilegio = $request->id_privilegio;
        $agente->save();
        if ($request->hasFile('foto_agente')) {
            $nombre_imagen = $agente->id_agente.".".$request->file('foto_agente')->extension();
            Storage::putFileAs('agentes',$request->file('foto_agente'),$nombre_imagen);
            $agente->foto_agente = $nombre_imagen;
            $agente->save();
        }
        
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Editar Agente";
        $viewData['agentes'] = agente::findOrFail($id);
        $viewData['privilegios'] = privilegio::all();
        if (!is_null($viewData['agentes']->foto_agente)) {
            $image = Storage::path('agentes/'.$viewData['agentes']->foto_agente);
            $imagenDatos = getimagesize($image);
            $ratio = calculateRatio(700,$imagenDatos[0],$imagenDatos[1]);
            $viewData['thumbAncho'] = round($imagenDatos[0] * $ratio);
            $viewData['thumbAlto'] = round($imagenDatos[1]* $ratio);
        }

        return view('admin.agenteFormEdit')->with('data',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        agente::validar($request);
        $agente = agente::findOrFail($id);
        $agente->setNombre($request->nombre);
        $agente->setApellidos($request->apellidos);
        $agente->setPassword(hash::make($request->password));
        $agente->setEmail($request->email);
        $agente->setCel1($request->cel1);
        $agente->setCel2($request->cel2);
        $agente->setIdPrivilegio($request->id_privilegio);
        if ($request->hasFile('foto_agente')) {
            $nombre_imagen = $agente->id_agente.".".$request->file('foto_agente')->extension();
            $request->file('foto_agente')->storeAs('agentes',$nombre_imagen);
            $agente->setFotoAgente($nombre_imagen);
        }

        $agente->save();
        
        return redirect()->route('admin.agenteForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $agente = agente::find($id);
            Storage::delete('agentes/'.$agente->foto_agente);
            agente::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Agente NO eliminado por tener relacion con otros datos";
          $data['ruta'] = 'admin.agenteForm.index';
          return view('admin.errorPage')->with('data',$data); 
       }   
       return view('admin.agenteForm')->with('data',$this->viewData());
    }
}
