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

