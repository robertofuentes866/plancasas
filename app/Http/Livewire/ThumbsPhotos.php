<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\tipo;
use App\Models\ofrecimiento;
use App\Models\localizacion;
use App\Models\ciudad;
use App\Models\recurso;
use App\Models\duracion;

class ThumbsPhotos extends Component
{
    public $titulo_en_foto_normal = '';
    public $fotoNormal = '';
    public $descripcion = '';
    public $residencial = '';
    public $casaNumero = '';
    public $leyenda = '';
    public $contador = 0;
    public $arrayProp = [];
    public $arrayFav = [];
    public $arrayPrecio = [];
    public $id_usuario = 0;
    public $titulo_thumbnail = '';
    public $titulo_thumbnail_lastQuery = '';
    public $i = 0;
    public $i_total = 0;
    public $accionFav = "Mis Favoritos";
    public $arrayOpcionesForm = '';
    public $lastQuery = '';

    public $id_ofrecimiento = '',$id_ciudad = '',$id_localizacion = '',$id_recurso = '',$id_duracion = '',
           $id_propiedad = 0,$gestion = '',$titulo = '',$habitaciones='',$banos='',$aires_acondicionado='',
           $abanicos_techo='',$precio_minimo=0,$precio_maximo=0,$agua_caliente='',$tanque_agua='',
           $sistema_seguridad='',$cuartoDomestica='',$piscina='';


    public function mount(...$argumentos){
       
       switch ($argumentos[0]) {
         case 0: // propiedades destacadas
            
            $this->gestion = $argumentos[0];
            $this->titulo = $argumentos[1]; // titulo en la barra superior derecha.
            $this->titulo_thumbnail = "Destacados"; 
            
            break;
         case 1: // llamada del formulario principal.
            
            $this->gestion = $argumentos[0];
            $instance = tipo::find($argumentos[5],'tipo');
            if ($argumentos[5]) {$this->arrayOpcionesForm .= ' Tipo: '. $instance->tipo.'-';}

            $this->id_ofrecimiento = $argumentos[1];
            $instance = ofrecimiento::find($this->id_ofrecimiento,'ofrecimiento');
            if ($argumentos[1]) {$this->arrayOpcionesForm .= ' Ofrecimiento: '. $instance->ofrecimiento.'-';}

            $this->id_ciudad = $argumentos[2]?['localizaciones.id_ciudad','=',$argumentos[2]]:['casas.disponibilidad','=',1];
            $instance = $argumentos[2]?ciudad::find($argumentos[2],'ciudad'):' ';
            if ($argumentos[2]) {$this->arrayOpcionesForm .= ' Ciudad: '. $instance->ciudad.'-';}
            $this->id_localizacion = $argumentos[3]?['localizaciones.id_localizacion','=',$argumentos[3]]:['casas.disponibilidad','=',1];
            $instance = $argumentos[3]?localizacion::find($argumentos[3],'residencial'):' ';
            if ($argumentos[3]) {$this->arrayOpcionesForm .= ' Residencial: '. $instance->residencial;}
            $this->titulo = $argumentos[4];
            $this->titulo_thumbnail = "Resultado busqueda";
            break;
        case 2: // propiedad seleccionada clicando boton MAS DETALLES...
            $this->gestion = $argumentos[0];
            $this->titulo = $argumentos[1];
            $this->id_propiedad = $argumentos[2];
            $this->arrayOpcionesForm = $argumentos[3];
            $this->titulo_thumbnail = "Fotos de la propiedad seleccionada";
            
            break;
        case 3:  // llamada del formulario detallado.
            $this->gestion = $argumentos[0];
            $this->titulo = $argumentos[1];
            $this->id_ciudad = $argumentos[2]?['localizaciones.id_ciudad','=',$argumentos[2]]:['casas.disponibilidad','=',1];
            $instance = $argumentos[2]?ciudad::find($argumentos[2],'ciudad'):' ';
            if ($argumentos[2]) {$this->arrayOpcionesForm .= 'Ciudad: '. $instance->ciudad.'- ';}

            $this->id_recurso = $argumentos[3]?['recursos.id_recurso','=',$argumentos[3]]:['casas.disponibilidad','=',1];
            $instance = $argumentos[3]?recurso::find($argumentos[3],'recurso'):' ';
            if ($argumentos[3]) {$this->arrayOpcionesForm .= 'Recurso: '. $instance->recurso.'- ';}

            $this->id_duracion = $argumentos[4]?['precios_casas.id_duracion','=',$argumentos[4]]:['casas.disponibilidad','=',1];
            $instance = $argumentos[4]?duracion::find($argumentos[4],'duracion'):' ';
            if ($argumentos[4]) {$this->arrayOpcionesForm .= 'Duracion: '. $instance->duracion.'- ';}

            $this->habitaciones = $argumentos[5];
            if($argumentos[5]){ $this->arrayOpcionesForm .= 'Habitaciones Minima: '. $argumentos[5].'- ';}

            $this->banos = $argumentos[6];
            if($argumentos[6]){ $this->arrayOpcionesForm .= 'Banos Minimo: '. $argumentos[6].'- ';}

            $this->aires_acondicionado = $argumentos[7];
            if($argumentos[7]){ $this->arrayOpcionesForm .= 'Aire Acond. Minimo: '. $argumentos[7].'- ';}

            $this->abanicos_techo = $argumentos[8];
            if($argumentos[8]){ $this->arrayOpcionesForm .= 'Abanicos Minimo: '. $argumentos[8].'- ';}

            $this->precio_minimo = $argumentos[9];
            if($argumentos[9]){ $this->arrayOpcionesForm .= 'Precio Minimo: '. $argumentos[9].'- ';}

            $this->precio_maximo = $argumentos[10];
            if($argumentos[10]){ $this->arrayOpcionesForm .= 'Precio Maximo: '. $argumentos[10].'- ';}

            $this->agua_caliente = $argumentos[11]?['casas.agua_caliente','=',1]:['casas.disponibilidad','=',1];
            if($argumentos[11]){ $this->arrayOpcionesForm .= 'Con agua caliente - ';  }

            $this->tanque_agua = $argumentos[12]?['casas.tanque_agua','=',1]:['casas.disponibilidad','=',1];
            if($argumentos[12]){ $this->arrayOpcionesForm .= 'Con tanque de agua - ';  }

            $this->sistema_seguridad = $argumentos[13]?['casas.sistema_seguridad','=',1]:['casas.disponibilidad','=',1];
            if($argumentos[13]){ $this->arrayOpcionesForm .= 'Con sistema de seguridad - ';  }

            $this->cuartoDomestica = $argumentos[14]?['casas.cuartoDomestica','=',1]:['casas.disponibilidad','=',1];
            if($argumentos[14]){ $this->arrayOpcionesForm .= 'Con cuarto de domestica - ';  }

            $this->piscina = $argumentos[15]?['casas.piscina','=',1]:['casas.disponibilidad','=',1];
            if($argumentos[15]){ $this->arrayOpcionesForm .= 'Con piscina ';  }
            
            $this->titulo_thumbnail = "Resultado busqueda";
            break;
       }
    }


    public function render() {

        $this->id_usuario = Auth::check()?Auth::id():0;
        $imagenes_casas = $this->get_casas();

        $this->lastQuery = $this->selectLastQuery(session()->getId());
        
        $favoritos_casas = $this->get_favoritos_casas();

        if (!$this->contador && ($imagenes_casas->count() || $favoritos_casas->count())) {
            // Entra aqui para mostrar la foto tamaño normal inicial y sus leyendas.
            $this->contador++;
 
            $this->fotoNormal = $imagenes_casas[0]->foto_normal??$favoritos_casas[0]->foto_normal??'';
            $this->descripcion = $imagenes_casas[0]->descripcion??$favoritos_casas[0]->descripcion??'';
            $this->residencial = $imagenes_casas[0]->residencial??$favoritos_casas[0]->residencial??'';
            $this->casaNumero = $imagenes_casas[0]->casaNumero??$favoritos_casas[0]->casaNumero??'';
            $this->id_propiedad = $imagenes_casas[0]->id_casa??$favoritos_casas[0]->id_casa??'';
            $this->leyenda = $imagenes_casas[0]->leyenda??$favoritos_casas[0]->leyenda??'';
            $this->titulo_en_foto_normal = $imagenes_casas[0]->titulo??$favoritos_casas[0]->titulo??'';
         }
       
            return view('livewire.thumbs-photos')->with('imagenes_casas',$imagenes_casas)
                                            ->with('favoritos_casas',$favoritos_casas);
                         
    }

    private function get_casas() {
        
        switch ($this->gestion) {
            case 0:  // propiedades destacadas.
                
                $this->lastQuery = DB::table('casas')->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                                    ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                                    ->where([['casas.destacado','=',1],['casas.disponibilidad','=',1],
                                                ['fotos_casas.es_principal','=',1]])
                                    ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'fotos_casas.foto_thumb',
                                                'fotos_casas.foto_normal','fotos_casas.id_foto','localizaciones.descripcion',
                                                'casas.id_casa','casas.casaNumero','localizaciones.residencial',
                                                DB::raw("'Destacados' as titulo" ))->get();
                                           
                $this->actualizarLastQuery($this->lastQuery,session()->getId());
                $this->titulo_thumbnail_lastQuery = "Destacados";
                return $this->lastQuery;
                break;  

            case 1: // llamado del formulario de busqueda.
       
                $this->lastQuery =  DB::table('casas')
                ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                ->join('ciudades','ciudades.id_ciudad','=','localizaciones.id_ciudad')
                ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                ->where([['precios_casas.id_ofrecimiento','=',$this->id_ofrecimiento],
                        [$this->id_ciudad[0],$this->id_ciudad[1],$this->id_ciudad[2] ],
                        [$this->id_localizacion[0],$this->id_localizacion[1],$this->id_localizacion[2]],
                    ['fotos_casas.es_principal','=',1],
                    ['casas.disponibilidad','=',1]])
                ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'casas.casaNumero','ciudades.ciudad','localizaciones.residencial','fotos_casas.foto_thumb',
                        'fotos_casas.foto_normal','localizaciones.descripcion','casas.id_casa','fotos_casas.id_foto',
                        DB::raw("'Resultado de busqueda' as titulo" ))
                ->groupBy('casas.casaNumero')->get();

                $this->actualizarLastQuery($this->lastQuery,session()->getId());
                $this->titulo_thumbnail_lastQuery = "Resultado de Busqueda";
                return $this->lastQuery;
                break;

           case 2:   // detalles de la propiedad.
               $this->titulo_thumbnail_lastQuery = "Otras propiedades";
               return DB::table('casas')
                      ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                      ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                      ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                      ->join('duraciones','duraciones.id_duracion','=','precios_casas.id_duracion')
                      ->join('recursos','recursos.id_recurso','=','precios_casas.id_recurso')
                      ->join('agentes','agentes.id_agente','=','casas.id_agente')
                      ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                      ->where([['casas.id_casa','=',$this->id_propiedad],['casas.disponibilidad','=',1]])
                      ->select('casas.casaNumero','localizaciones.residencial','localizaciones.descripcion','fotos_casas.foto_thumb',
                                'fotos_casas.foto_normal','casas.id_casa','fotos_casas.id_foto','fotos_casas.leyenda',
                               'casas.area_construccion','casas.area_terreno','casas.ano_construccion',
                               'casas.plantas','casas.garage','casas.habitaciones','casas.banos',
                               'casas.piscina','casas.cuartoDomestica','casas.bano_social',
                                'recursos.recurso','ofrecimientos.ofrecimiento','duraciones.duracion',
                                'precios_casas.valor','ofrecimientos.id_ofrecimiento','duraciones.id_duracion',
                                'recursos.id_recurso',DB::raw("CONCAT(agentes.nombre,' ',agentes.apellidos) as nombre_agente"),
                                'agentes.cel1','agentes.cel2','agentes.email','agentes.foto_agente',
                                'casas.aires_acondicionado','casas.abanicos_techo','casas.agua_caliente','casas.tanque_agua',
                                'casas.sistema_seguridad','casas.descripcion',DB::raw("'Ambientes' as titulo" ))->get();
                
                break;

            case 3: // llamado del formulario detallado.
       
               $this->lastQuery = DB::table('casas')
                ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                ->join('ciudades','ciudades.id_ciudad','=','localizaciones.id_ciudad')
                ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                ->join('duraciones','duraciones.id_duracion','=','precios_casas.id_duracion')
                ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                ->join('recursos','recursos.id_recurso','=','precios_casas.id_recurso')
                ->where([[$this->id_recurso[0],$this->id_recurso[1],$this->id_recurso[2]],
                        [$this->id_ciudad[0],$this->id_ciudad[1],$this->id_ciudad[2]],
                        [$this->id_duracion[0],$this->id_duracion[1],$this->id_duracion[2]],
                    ['fotos_casas.es_principal','=',1],
                    ['casas.habitaciones','>=',$this->habitaciones],
                    ['casas.banos','>=',$this->banos],
                    ['casas.aires_acondicionado','>=',$this->aires_acondicionado],
                    ['casas.abanicos_techo','>=',$this->abanicos_techo],
                    [$this->agua_caliente[0],$this->agua_caliente[1],$this->agua_caliente[2]],
                    [$this->tanque_agua[0],$this->tanque_agua[1],$this->tanque_agua[2]],
                    [$this->sistema_seguridad[0],$this->sistema_seguridad[1],$this->sistema_seguridad[2]],
                    [$this->cuartoDomestica[0],$this->cuartoDomestica[1],$this->cuartoDomestica[2]],
                    [$this->piscina[0],$this->piscina[1],$this->piscina[2]],
                    ['precios_casas.valor','>=',$this->precio_minimo],
                    ['precios_casas.valor','<=',$this->precio_maximo],
                    ['casas.disponibilidad','=',1]])
                ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'casas.casaNumero','ciudades.ciudad','localizaciones.residencial','fotos_casas.foto_thumb',
                        'fotos_casas.foto_normal','localizaciones.descripcion','casas.id_casa','fotos_casas.id_foto',
                        DB::raw("'Resultado de busqueda' as titulo" ))
                ->groupBy('casas.casaNumero')->get();
                $this->actualizarLastQuery($this->lastQuery,session()->getId());
                $this->titulo_thumbnail_lastQuery = "Resultado de Busqueda";
              return $this->lastQuery;
                break;

        }
    }

    public function selectNormalImagen($foto,$descrip,$residencial,$casaNumero,$id,$leyenda,$ttl) {
        $this->id_propiedad = $id;
        $this->fotoNormal = $foto;
        $this->descripcion = $descrip;
        $this->residencial = $residencial;
        $this->casaNumero = $casaNumero;
        $this->leyenda = $leyenda;
        $this->titulo_en_foto_normal = $ttl;
    }

    public function accionFavorito($id) {
        $hallo = $this->buscarFavorito($id);
        if ($hallo) {   //borrar Favorito.
            $result = $this->borrarFavorito($id);
            $this->accionFav = "Agregado a Mis Favoritos";
        } else {  // registrar Favorito.
            $result = $this->insertarFavorito($id);
            $this->accionFav = "Borrado de Mis Favoritos";
        }
    }

    public function buscarFavorito($id_casa) {
         
        $tuplas = count(DB::table('favoritos_casas')->where([['favoritos_casas.id_casa','=',$id_casa],
                               ['favoritos_casas.id_usuario','=',$this->id_usuario]])->get());
        return $tuplas;
    }
    
    private function borrarFavorito($id_casa) {
       
        return DB::table('favoritos_casas')->where([['favoritos_casas.id_casa','=',$id_casa],
                                    ['favoritos_casas.id_usuario','=',$this->id_usuario]])->delete();
    }

    private function insertarFavorito($id_casa){
        
        return DB::table('favoritos_casas')->insert(
            array('id_casa' => $id_casa, 'id_usuario' => $this->id_usuario));
        
    }

    private function get_favoritos_casas(){
        return DB::table('favoritos_casas')
                ->join('casas','casas.id_casa','=','favoritos_casas.id_casa')
                ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                ->where([['casas.disponibilidad','=',1],
                         ['fotos_casas.es_principal','=',1],
                         ['favoritos_casas.id_usuario','=',$this->id_usuario]])
                ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'fotos_casas.foto_thumb',
                            'fotos_casas.foto_normal','fotos_casas.id_foto','localizaciones.descripcion',
                            'casas.id_casa','casas.casaNumero','localizaciones.residencial',
                          DB::raw("'Favoritos' as titulo" ))->get();
    }

    private function actualizarLastQuery($lastQuery,$id) {
          session(['id'=>$lastQuery]);
    }

    public function selectLastQuery($id) {
        $lastQ = session('id');
       return $lastQ;
    }

}
