<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\fotosCasa;
use App\Models\casa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class fotosCasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $viewData = [];

     protected function viewData () {
        $viewData = [];
        $viewData['title'] = "Formulario - Fotos Casa";
        $viewData['fotosCasa'] = fotosCasa::all();
        $viewData['casas'] = casa::all();
        $viewData['buscarFilas'] = DB::table('fotos_casas')
                                  ->join('casas','fotos_casas.id_casa','=','casas.id_casa')
                                  ->select('casas.casaNumero')
                                  ->groupBy('casas.casaNumero')->get();

        $viewData['relacion'] = DB::table('fotos_casas')
                                    ->join('casas','fotos_casas.id_casa','=','casas.id_casa')
                                    ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                                    ->select('localizaciones.residencial','casas.casaNumero','fotos_casas.leyenda','fotos_casas.id_foto')
                                    ->orderBy('casas.id_casa')
                                    ->get();
        return $viewData;
     }
    public function index()
    {
        return view('admin.fotosCasaForm')->with('data',$this->viewData());
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
        $fotosCasa = new fotosCasa();
        $fotosCasa->validar($request);
        $fotosCasa->id_casa = $request->id_casa;
        $fotosCasa->leyenda = $request->leyenda;
        $fotosCasa->es_principal = $request->es_principal?1:0;
        $fotosCasa->save();
        if ($request->hasFile('foto_normal')) {
            $nombre_imagen = $fotosCasa->id_foto.".".$request->file('foto_normal')->extension();
            Storage::putFileAs('propiedades',$request->file('foto_normal'),$nombre_imagen);
            $fotosCasa->foto_normal = $nombre_imagen;
            $fotosCasa->save();
        }
        if ($request->hasFile('foto_thumb')) {
            $nombre_imagen = $fotosCasa->id_foto."_th.".$request->file('foto_thumb')->extension();
            Storage::putFileAs('propiedades',$request->file('foto_thumb'),$nombre_imagen);
            $fotosCasa->foto_thumb = $nombre_imagen;
            $fotosCasa->save();
        }
        
        return redirect()->route('admin.fotosCasaForm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fotosCasa  $fotosCasa
     * @return \Illuminate\Http\Response
     */
    public function show(fotosCasa $fotosCasa)
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
        $viewData['title'] = "Editar Fotos Casa";
        $viewData['fotosCasa'] = fotosCasa::findOrFail($id);
        $viewData['casas'] = casa::all();
        if (!is_null($viewData['fotosCasa']->foto_thumb)) {  // procesa si hay foto guardada.
            $image = Storage::path('propiedades/'.$viewData['fotosCasa']->foto_thumb);
            $imagenDatos = getimagesize($image);
            $ratio = calculateRatio(100,$imagenDatos[0],$imagenDatos[1]);
            $viewData['thumbAncho'] = round($imagenDatos[0] * $ratio);
            $viewData['thumbAlto'] = round($imagenDatos[1]* $ratio);
        }

        return view('admin.fotosCasaFormEdit')->with('data',$viewData);
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
        $fotosCasa = fotosCasa::findOrFail($id);
        $fotosCasa->setLeyenda($request->leyenda);
        $fotosCasa->setEsPrincipal($request->es_principal?1:0);
        
        if ($request->hasFile('foto_normal')) {
            $nombre_imagen = $fotosCasa->id_foto.".".$request->file('foto_normal')->extension();
            $request->file('foto_normal')->storeAs('propiedades',$nombre_imagen);
            $fotosCasa->setFotoNormal($nombre_imagen);
        }

        if ($request->hasFile('foto_thumb')) {
            $nombre_imagen = $fotosCasa->id_foto."_th.".$request->file('foto_thumb')->extension();
            $request->file('foto_thumb')->storeAs('propiedades',$nombre_imagen);
            $fotosCasa->setFotoThumb($nombre_imagen);
        }

        $fotosCasa->save();
        
        return redirect()->route('admin.fotosCasaForm.index');
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
            $fotosCasa = fotosCasa::find($id);
            Storage::delete('propiedades/'.$fotosCasa->foto_normal);
            Storage::delete('propiedades/'.$fotosCasa->foto_thumb);
            fotosCasa::destroy($id);
       } catch(\Exception $e) {
          $data =[];
          $data['mensaje'] = "Fotos NO eliminadas por tener relacion con otros datos";
          $data['ruta'] = 'admin.fotosCasaForm.index';
          return view('admin.errorPage')->with('data',$data);
       }

       // return $this->index();
       return back();
    }
}
