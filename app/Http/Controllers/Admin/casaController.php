<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\casa;
use App\Models\agente;
use App\Models\tipo;
use App\Models\localizacion;
use App\Models\recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class casaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $viewData = [];

     private function viewData() {
        $viewData = [];
        $viewData['title'] = "Formulario - Casas";
        $viewData['agentes'] = agente::all();
        $viewData['tipos'] = tipo::all();
        $viewData['localizaciones'] = localizacion::all();
        $viewData['relacion'] = DB::table('casas')
                                    ->join('agentes','casas.id_agente','=','agentes.id_agente')
                                    ->join('tipos','casas.id_tipo','=','tipos.id_tipo')
                                    ->join('localizaciones','casas.id_localizacion','=','localizaciones.id_localizacion')
                                    ->join('ciudades','localizaciones.id_ciudad','=','ciudades.id_ciudad')
                                    ->select('casas.id_casa','agentes.nombre as nombreAgente','localizaciones.residencial',
                                    'casas.casaNumero','ciudades.ciudad','casas.descripcion')
                                    ->orderBy('casas.casaNumero')
                                    ->get();
        return $viewData;
     }

    public function index()
    {
        return view('admin.casaForm')->with('data',$this->viewData());
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
        casa::validar($request);
        $creationData = $request->only(["id_agente","id_tipo","id_localizacion","casaNumero","area_construccion",
                        "area_terreno","plantas","garage","habitaciones","banos","bano_social","cuartoDomestica","piscina",
                        "apartamento","destacado","disponibilidad","ano_construccion","aires_acondicionado",
                        "abanicos_techo","descripcion"]);
        $creationData['piscina'] = $request->input('piscina')?1:0;
        $creationData['apartamento'] = $request->input('apartamento')?1:0;
        $creationData['bano_social'] = $request->input('bano_social')?1:0;
        $creationData['cuartoDomestica'] = $request->input('cuartoDomestica')?1:0;
        $creationData['disponibilidad'] = $request->input('disponibilidad')?1:0;
        $creationData['destacado'] = $request->input('destacado')?1:0;

        $creationData['agua_caliente'] = $request->input('agua_caliente')?1:0;
        $creationData['tanque_agua'] = $request->input('tanque_agua')?1:0;
        $creationData['sistema_seguridad'] = $request->input('sistema_seguridad')?1:0;
        casa::create($creationData);
        
        return redirect()->route('admin.casaForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function show(casa $casa)
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
        $viewData['title'] = "Editar Casa";
        $viewData['casas'] = casa::findOrFail($id);
        $viewData['agentes'] = agente::all();
        $viewData['localizaciones'] = localizacion::all();
        return view('admin.casaFormEdit')->with('data',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $casa = casa::find($id);
        $updateData = $request->all();
        $updateData['piscina'] = $request->input('piscina')?1:0;
        $updateData['apartamento'] = $request->input('apartamento')?1:0;
        $updateData['bano_social'] = $request->input('bano_social')?1:0;
        $updateData['cuartoDomestica'] = $request->input('cuartoDomestica')?1:0;
        $updateData['disponibilidad'] = $request->input('disponibilidad')?1:0;
        $updateData['destacado'] = $request->input('destacado')?1:0;

        $updateData['agua_caliente'] = $request->input('agua_caliente')?1:0;
        $updateData['tanque_agua'] = $request->input('tanque_agua')?1:0;
        $updateData['sistema_seguridad'] = $request->input('sistema_seguridad')?1:0;
        
        if ($casa->update($updateData)) {
            return redirect()->route('admin.casaForm.index');
        } else {
            echo "No se pudo ejecutar el UPDATE";
        }
        
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
            casa::find($id);
            $this->borrar_fotos($id);
            $this->borrar_valores($id);
            /*$this->borrar_favoritos($id);*/
            casa::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Casa NO se pudo eliminar del sistema";
          $data['ruta'] = 'admin.casaForm.index';
          return view('admin.errorPage')->with('data',$data);
       }   

        return $this->index();
    }

    private function borrar_fotos($id) {
        $fotos_casas = DB::table('fotos_casas')
                     ->where('id_casa','=',$id)
                     ->select('foto_normal','foto_thumb')->get();
       
        foreach($fotos_casas as $fotos) { // si no hay fotos en la tabla fotos_casas, no entra en este loop.
            
            if (!is_null($fotos->foto_normal)) {
                Storage::delete('propiedades/'.$fotos->foto_normal);
            }
            
            if (!is_null($fotos->foto_thumb)) {
                Storage::delete('propiedades/'.$fotos->foto_thumb);
            }
            DB::delete('delete from fotos_casas where id_casa = ?',[$id]);
        } 
    }

    private function borrar_valores($id){
        DB::table('precios_casas')->where('id_casa','=',$id)->delete();
    }
}
