<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preciosCasa extends Model
{
    protected $table = "precios_casas";
    protected $fillable = ["id_casa","id_recurso","id_ofrecimiento","id_duracion","valor","disponibilidad"];
    
    use HasFactory; 

    public static function validar($request) {
        $request->validate(['valor'=>'numeric:>0',
                            'id_casa'=>'required',
                            'id_ofrecimiento'=>'required',
                            'id_duracion'=>'required',
                             'id_recurso'=>'required']);
    }

    public function getIdCasa() {
        return $this->attributes['id_casa'];
    }

    public function setIdCasa($id) {
        $this->attributes['id_casa'] = $id;
    }


    public function getIdRecurso() {
        return $this->attributes['id_recurso'];
    }

    public function setIdRecurso($id) {
        $this->attributes['id_recurso'] = $id;
    }
    public function getIdOfrecimiento() {
        return $this->attributes['id_ofrecimiento'];
    }

    public function setIdOfrecimiento($id) {
        $this->attributes['id_ofrecimiento'] = $id;
    }
    public function getIdDuracion() {
        return $this->attributes['id_duracion'];
    }

    public function setIdDuracion($id) {
        $this->attributes['id_duracion'] = $id;
    }
    public function getValor() {
        return $this->attributes['valor'];
    }

    public function setValor($valor) {
        $this->attributes['valor'] = $valor;
    }

    public function getDisponibilidad(){
        return $this->attributes['disponibilidad'];
    }

    public function setDisponibilidad($dsp) {
        $this->attributes['disponibilidad'] = $dsp;
    }
}
