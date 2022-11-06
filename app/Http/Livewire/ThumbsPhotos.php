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
    public $contador = 0;

    public $ofrecimiento = '';
    public $ciudad = '';
    public $localizacion = '';
    public $tipo = '';
    public $titulo = '';

    public function mount($tipo,$ofrecimiento,$ciudad,$localizacion,$titulo) {
       $this->tipo = $tipo;
       $this->ofrecimiento = $ofrecimiento;
       $this->ciudad = $ciudad;
       $this->localizacion = $localizacion;
       $this->titulo = $titulo;
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
   
         }
        return view('livewire.thumbs-photos')->with('imagenes_casas',$imagenes_casas);                                  
    }

    private function get_casas() {
        if (!$this->tipo) {
            return DB::table('casas')->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                                    ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                                    ->where([['casas.destacado','=',1],['casas.disponibilidad','=',1],
                                                ['fotos_casas.es_principal','=',1]])
                                    ->select('casas.casaNumero','localizaciones.residencial','fotos_casas.foto_thumb',
                                                'fotos_casas.foto_normal','localizaciones.descripcion')->get();
        } else {
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
            ->select('casas.casaNumero','ciudades.ciudad','localizaciones.residencial','fotos_casas.foto_thumb',
                       'fotos_casas.foto_normal','localizaciones.descripcion')
            ->groupBy('casas.casaNumero')->get();

        }
    }

    public function selectNormalImagen($foto,$descrip,$residencial,$casaNumero) {
        $this->contador++;
        $this->fotoNormal = $foto;
        $this->descripcion = $descrip;
        $this->residencial = $residencial;
        $this->casaNumero = $casaNumero;
    }
}
