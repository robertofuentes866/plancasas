<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class localizacion extends Model
{
    protected $table = "localizaciones";
    protected $primaryKey = "id_localizacion";
    protected $fillable = ['id_ciudad','residencial','direccion','descripcion'];
    protected $hidden = ['id_localizacion','id_ciudad'];
    

    use HasFactory;

    public static function validar($request) {
        $request->validate(['residencial'=>'required|max:35',
                             'id_ciudad'=>'required',
                              'descripcion'=>'required']);
    }


    public function obtenerLocalizaciones(){
        return localizacion::all();
    }

    public function obtenerLocalizacionesPorId($id){
        return localizacion::find($id);
    }

    public function getId() {
        return $this->attributes['id_localizacion'];
    }

    public function getIdCiudad(){
        return $this->attributes['id_ciudad'];
    }

    public function getResidencial() {
        return $this->attributes['residencial'];
    }

    public function getDescripcion(){
        return $this->attributes['descripcion'];
    }

    public function getDireccion() {
        return $this->attributes['direccion'];
    }

    public function setResidencial($residencial) {
        $this->attributes['residencial'] = $residencial;
    }

    public function setDireccion($direccion) {
        $this->attributes['direccion'] = $direccion;
    }

    public function setDescripcion($d) {
        $this->attributes['descripcion'] = $d;
    }

    public function setId($id) {
        $this->attributes['id_localizacion'] = $id;
    }

    public function setIdCiudad($id_ciudad) {
        $this->attributes['id_ciudad'] = $id_ciudad;
    }
}
