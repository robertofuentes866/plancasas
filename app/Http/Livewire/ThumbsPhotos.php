<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;


class ThumbsPhotos extends Component
{
    
    public $fotoNormal = '';
    public $descripcion = '';
    public $residencial = '';
    public $casaNumero = '';
    public $leyenda = '';
    public $id_propiedad = 0;
    public $contador = 0;
    public $arrayProp = [];
    public $arrayPrecio = [];

    public $ofrecimiento = '';
    public $ciudad = '';
    public $localizacion = '';
    public $tipo = '';
    public $titulo = '';

    public function mount($tipo,$ofrecimiento,$ciudad,$localizacion,$titulo,$id_propiedad){
       $this->tipo = $tipo;
       $this->ofrecimiento = $ofrecimiento;
       $this->ciudad = $ciudad;
       $this->localizacion = $localizacion;
       $this->titulo = $titulo;
       $this->id_propiedad = $id_propiedad;
       $this->render();
    }


    public function render() {
       
        $imagenes_casas = $this->get_casas();
        if (!$this->contador) {
            $this->contador++;

            $this->fotoNormal = $imagenes_casas[0]->foto_normal;
            $this->descripcion = $imagenes_casas[0]->descripcion;
            $this->residencial = $imagenes_casas[0]->residencial;
            $this->casaNumero = $imagenes_casas[0]->casaNumero;
            $this->id_propiedad = $imagenes_casas[0]->id_casa;
            $this->leyenda = $imagenes_casas[0]->leyenda;
   
         }
        return view('livewire.thumbs-photos')->with('imagenes_casas',$imagenes_casas);                                  
    }

    private function get_casas() {
        switch ($this->tipo) {
            case 0:  // propiedades destacadas.
        
                return DB::table('casas')->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                                    ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                                    ->where([['casas.destacado','=',1],['casas.disponibilidad','=',1],
                                                ['fotos_casas.es_principal','=',1]])
                                    ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'fotos_casas.foto_thumb',
                                                'fotos_casas.foto_normal','fotos_casas.id_foto','localizaciones.descripcion',
                                                'casas.id_casa','casas.casaNumero','localizaciones.residencial')->get();
                break;  

            case 1: // llamado del formulario de busqueda.
       
                return DB::table('casas')
                ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                ->join('ciudades','ciudades.id_ciudad','=','localizaciones.id_ciudad')
                ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                ->where([['precios_casas.id_ofrecimiento','=',$this->ofrecimiento],
                        ['localizaciones.id_ciudad','=',$this->ciudad],
                        ['localizaciones.id_localizacion','=',$this->localizacion],
                    ['fotos_casas.es_principal','=',1],
                    ['casas.disponibilidad','=',1]])
                ->select(DB::raw("CONCAT(casas.casaNumero,' - ',localizaciones.residencial) as leyenda"),'casas.casaNumero','ciudades.ciudad','localizaciones.residencial','fotos_casas.foto_thumb',
                        'fotos_casas.foto_normal','localizaciones.descripcion','casas.id_casa','fotos_casas.id_foto')
                ->groupBy('casas.casaNumero')->get();

                break;

           case 2:   // detalles de la propiedad.
               
               return DB::table('casas')
                      ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                      ->join('precios_casas','precios_casas.id_casa','=','casas.id_casa')
                      ->join('ofrecimientos','ofrecimientos.id_ofrecimiento','=','precios_casas.id_ofrecimiento')
                      ->join('duraciones','duraciones.id_duracion','=','precios_casas.id_duracion')
                      ->join('recursos','recursos.id_recurso','=','precios_casas.id_recurso')
                      ->join('agentes','agentes.id_agente','=','casas.id_agente')
                      ->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                      ->where('casas.id_casa','=',$this->id_propiedad)
                      ->select('casas.casaNumero','localizaciones.residencial','localizaciones.descripcion','fotos_casas.foto_thumb',
                                'fotos_casas.foto_normal','casas.id_casa','fotos_casas.id_foto','fotos_casas.leyenda',
                               'casas.area_construccion','casas.area_terreno','casas.ano_construccion',
                               'casas.plantas','casas.garage','casas.habitaciones','casas.banos',
                               'casas.piscina','casas.cuartoDomestica','casas.bano_social',
                                'recursos.recurso','ofrecimientos.ofrecimiento','duraciones.duracion',
                                'precios_casas.valor','ofrecimientos.id_ofrecimiento','duraciones.id_duracion',
                                'recursos.id_recurso')->get();

        }
    }

    public function selectNormalImagen($foto,$descrip,$residencial,$casaNumero,$id,$leyenda) {
        $this->id_propiedad = $id;
        $this->fotoNormal = $foto;
        $this->descripcion = $descrip;
        $this->residencial = $residencial;
        $this->casaNumero = $casaNumero;
        $this->leyenda = $leyenda;
    }
}
