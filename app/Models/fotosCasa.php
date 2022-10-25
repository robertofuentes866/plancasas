<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotosCasa extends Model
{
    protected $table = "fotos_casas";
    protected $primaryKey = "id_foto";
    use HasFactory;

    public static function validar($request) {
        $request->validate([]);
    }

    public function getId() {
        return $this->attributes['id_foto'];
    }

    public function setId($id) {
        $this->attributes['id_foto'] = $id;
    }

    public function getIdCasa(){
        return $this->attributes['id_casa'];
    }

    public function setIdCasa($id_casa) {
        $this->attributes['id_casa'] = $id_casa;
    }

    public function getFotoNormal() {
        return $this->attributes['foto_normal'];
    }

    public function setFotoNormal($normal) {
        $this->attributes['foto_normal'] = $normal;
    }

    public function getFotoThumb() {
        return $this->attributes['foto_thumb'];
    }

    public function setFotoThumb($thumb) {
        $this->attributes['foto_thumb'] = $thumb;
    }

    public function getLeyenda() {
        return $this->attributes['leyenda'];
    }

    public function setLeyenda($leyenda) {
        $this->attributes['leyenda'] = $leyenda;
    }
 
    public function getEsPrincipal() {
        return $this->attributes['es_principal'];
    }

    public function setEsPrincipal($eP) {
        $this->attributes['es_principal'] = $eP;
    }
}
