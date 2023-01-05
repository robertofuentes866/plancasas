<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duracion extends Model
{
    protected $table = "duraciones";
    protected $primaryKey = "id_duracion";
    protected $fillable = ['duracion'];
    protected $hidden = ['id_duracion'];

    use HasFactory;

    public static function validar($request) {
        $request->validate(['duracion'=>'required']);
    }


    public function obtenerDuraciones(){
        return duracion::all();
    }

    public function obtenerDuracionesPorId($id){
        return duracion::find($id);
    }

    public function getId() {
        return $this->attributes['id_duracion'];
    }

    public function getDuracion(){
        return $this->attributes['duracion'];
    }

    public function setduracion($duracion) {
        $this->attributes['duracion'] = $duracion;
    }
}
