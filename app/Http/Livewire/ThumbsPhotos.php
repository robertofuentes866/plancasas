<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;


class ThumbsPhotos extends Component
{
    public function render()
    {
        $imagenes_casas = $this->casas_destacadas();
        return view('livewire.thumbs-photos')->with('imagenes_casas',$imagenes_casas);
    }

    private function casas_destacadas() {
        return DB::table('casas')->join('localizaciones','localizaciones.id_localizacion','=','casas.id_localizacion')
                                   ->join('fotos_casas','fotos_casas.id_casa','=','casas.id_casa')
                                   ->where([['casas.destacado','=',1],['casas.disponibilidad','=',1],
                                            ['fotos_casas.es_principal','=',1]])
                                   ->select('casas.casaNumero','localizaciones.residencial','fotos_casas.foto_thumb')->get();
    }
}
