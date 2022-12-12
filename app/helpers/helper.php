<?php
//calcula el radio para reducir fotos a thumbnail. $max es el maximo tamaño del thumbnail.
// $width and $height son los tamaños originales de la foto normal.
function calculateRatio($max,$width,$height){
        if ($width > $height){
            return $max / $width;
        } else {
            return $max / $height;
        }
}

function propiedadIncluida($id_casa,$id_foto,&$arrayProp) {
    if (!in_array($id_casa.$id_foto,$arrayProp)) {
        $arrayProp[] = $id_casa.$id_foto;
        return false;
    } else {
        return true;
    }
}

function precioIncluido($id_casa,$id_ofr,$id_dur,$id_rec,&$arrayProp) {
    if (!in_array($id_casa.$id_ofr.$id_dur.$id_rec,$arrayProp)) {
        $arrayProp[] = $id_casa.$id_ofr.$id_dur.$id_rec;
        return false;
    } else {
        return true;
    }
}

function buscarFavorito($id_casa,$id_usuario) {
    return count(DB::table('favoritos_casas')->where([['favoritos_casas.id_casa','=',$id_casa],
                            ['favoritos_casas.id_usuario','=',$id_usuario]])->get());
}

function incrementaIndice(&$i) {
    return $i++;
}

function init_variables(&$i,&$t,&$a) {
    $i = 0;
    $t = 0;
    $a = [];
}

function agregarThumbsToCarrousel() {
    init_variables($i,$i_total,$arrayProp);
    $permiteAbrirGrupoCarrusel= true;       
    foreach($imagenes_casas as $imagen_casa)
        incrementaIndice($i_total)
    
        if (! propiedadIncluida($imagen_casa->id_casa,$imagen_casa->id_foto,$arrayProp))
            if ((!($i % 4)) && $permiteAbrirGrupoCarrusel)
            
            echo '<div class="carousel-item {{$i==0?'active ':''}} row row-cols-2">';
            
            @endif  

                <div class="col" style=" float:right; height:120px;">
                    @php(incrementaIndice($i))
                    @php($permiteAbrirGrupoCarrusel=false)
                    <figure  wire:click="selectNormalImagen({{$comillas.$imagen_casa->foto_normal.$comillas}},
                            {{$comillas.$imagen_casa->descripcion.$comillas}},
                            {{$comillas.$imagen_casa->residencial.$comillas}},
                            {{$comillas.$imagen_casa->casaNumero.$comillas}},
                            {{$comillas.$imagen_casa->id_casa.$comillas}},
                            {{$comillas.$imagen_casa->leyenda.$comillas}},
                            {{$comillas.$titulo_thumbnail.$comillas}})"> 
                        <img class="img-thumbnail" 
                            src="{{asset('storage/propiedades/'.$imagen_casa->foto_thumb)}}" 
                            alt=" " width="84" height="54">
                        <figcaption> {{$imagen_casa->leyenda}} </figcaption>
                    </figure>
                </div>
        @endif 
        @if ( ( (!($i % 4)) or ($i_total >= $imagenes_casas->count()) ) && !$permiteAbrirGrupoCarrusel )
        @php($permiteAbrirGrupoCarrusel=true)
        </div> 
        @endif
    @endforeach
}



