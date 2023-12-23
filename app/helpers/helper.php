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
   
    echo '<div id="'.$nombreCarrusel.'" class="mx-0 carousel carousel-dark slide" data-interval="false" data-ride="carousel">
         
        <div class="carousel-inner container">';
   
    foreach($fotos_thumb as $imagen_casa) {
        //dd($imagen_casa->habitaciones);
        incrementaIndice($i_total);
    
        if (! propiedadIncluida($imagen_casa->id_casa,$imagen_casa->id_foto,$arrayProp)) {
            if ((!($i % $numPropPorRotacion)) && $permiteAbrirGrupoCarrusel)
            {

                if ($i==0) {
                    echo '<div class="carousel-item active row row-cols-md-2 g-2">';
                } else {
                    echo '<div class="carousel-item row row-cols-md-2 g-2">';
                }
               
            } 
                
            incrementaIndice($i);
            $permiteAbrirGrupoCarrusel=false;
            echo "<div class=\"card col float-start\">";
            echo "<div class=\"card-body d-block mx-auto\">";
            echo "<a href=\"#top_detalles\" wire:click=\"selectNormalImagen($comillas$imagen_casa->foto_normal$comillas,
                    $comillas$imagen_casa->residencial$comillas,
                    $comillas$imagen_casa->casaNumero$comillas,
                    $comillas$imagen_casa->id_casa$comillas,
                    $comillas$imagen_casa->leyenda$comillas,
                    $comillas$titulo$comillas,
                    $comillas$nombreCarrusel$comillas)\">
                    
                <img width=<\"180px\" height=\"120px\" src=". asset(session('camino_mostrar').'/propiedades/'.$imagen_casa->foto_thumb)."
                    alt=\"casa venta renta en $imagen_casa->residencial.\"></a>
                </div><div class=\"card-footer\">
                <div class=\"text-center\">
                <h6><small class=\"text-muted\">$imagen_casa->residencial Num. $imagen_casa->casaNumero</small></h6>
                <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habitaciones\"><img class=\"me-1\" width=\"20px\" src=\"".asset(session('camino_mostrar').'/imagenes_app/sleeping-icon.png')."\" alt=\"Numero Habitaciones\"></a>";
                 
                 if ($imagen_casa->cuartoDomestica)
                 {
                    echo "<span class=\"me-1\">". $imagen_casa->habitaciones ."</span> + <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Cuarto de doméstica\"> <img class=\"me-4\" width=\"25px\" src=\"".asset(session('camino_mostrar').'/imagenes_app/service-room.png')."\" alt=\"Cuarto Servicio\"></a>";
                 } else
                 {
                    echo "<span class=\"me-4\">". $imagen_casa->habitaciones ."</span>";
                 }
                echo "<a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Baños\"><img class=\"me-1\" width=\"20px\" src=\"".asset(session('camino_mostrar').'/imagenes_app/bath-icon.png')."\" alt=\"Numero banos\"></a>
                <span class=\"me-4\">". $imagen_casa->banos."</span>
                <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Garage para vehículos\"><img class=\"mx-1\" width=\"25px\" src=\"".asset(session('camino_mostrar').'/imagenes_app/parking-icon.png')."\" alt=\"Numero garage\"></a>
                <span class=\"me-4\">". $imagen_casa->garage ."</span></div>
             </div></div>";
        }
        if ( ( (!($i % $numPropPorRotacion)) or ($i_total >= $fotos_thumb->count()) ) && !$permiteAbrirGrupoCarrusel ) {
            $permiteAbrirGrupoCarrusel=true;

            echo '</div>'; 
           
        }
    }

    echo'</div>
        <a class="carousel-control-prev" role="button" data-target="#'.$nombreCarrusel.'" data-slide="prev">
        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
        <span class="sr-only">Previous</span></a>
        <a class="carousel-control-next" role="button" data-target="#'.$nombreCarrusel.'" data-slide="next">
        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
        <span class="sr-only">Next</span></a>
        </div>';
        
}



