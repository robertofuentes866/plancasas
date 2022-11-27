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


