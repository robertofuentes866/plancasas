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

function agregarThumbsToCarrousel($fotos_thumb,$titulo,$nombreCarrusel) {
    $comillas = htmlentities('"');
    $numPropPorRotacion = 4; // Numero de propiedades por pagina.
    init_variables($i,$i_total,$arrayProp);
    $permiteAbrirGrupoCarrusel= true;
    
    echo '<div id="'.$nombreCarrusel.'" class="carousel carousel-dark slide" data-interval="false">
        <div class="carousel-inner">';

    foreach($fotos_thumb as $imagen_casa) {
        incrementaIndice($i_total);
    
        if (! propiedadIncluida($imagen_casa->id_casa,$imagen_casa->id_foto,$arrayProp)) {
            if ((!($i % $numPropPorRotacion)) && $permiteAbrirGrupoCarrusel) {

                if ($i==0) {
                    echo '<div class="carousel-item active row row-cols-2">';
                } else {
                    echo '<div class="carousel-item row row-cols-2">';
                }
            } 
                echo '<div class="col" style=" float:right; height:120px;">';
                    incrementaIndice($i);
                    $permiteAbrirGrupoCarrusel=false;
                    echo "<figure wire:click=\"selectNormalImagen($comillas$imagen_casa->foto_normal$comillas,
                            $comillas$imagen_casa->descripcion$comillas,
                            $comillas$imagen_casa->residencial$comillas,
                            $comillas$imagen_casa->casaNumero$comillas,
                            $comillas$imagen_casa->id_casa$comillas,
                            $comillas$imagen_casa->leyenda$comillas,
                            $comillas$titulo$comillas)\">
                        <img class='img-thumbnail' 
                            src=". asset('storage/propiedades/'.$imagen_casa->foto_thumb) 
                            ." width=\"84\" height=\"54\">
                        <figcaption> $imagen_casa->leyenda </figcaption>
                    </figure>
                </div>";
        }
        if ( ( (!($i % $numPropPorRotacion)) or ($i_total >= $fotos_thumb->count()) ) && !$permiteAbrirGrupoCarrusel ) {
            $permiteAbrirGrupoCarrusel=true;
            /*echo '<div class="carousel-caption d-none d-md-block">
                     <h5>'.ceil($i / $numPropPorRotacion).'</h5>
                    </div>'; */

            echo '</div>'; 
           
        }
    }

    echo'</div> 
        <button  class="carousel-control-prev bg-light ml-0 flechas" type="button" data-target="#'.$nombreCarrusel.'" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span></button>
        <button class="carousel-control-next bg-light mr-0 flechas" type="button" data-target="#'.$nombreCarrusel.'" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span></button>
        </div>';
        
}



