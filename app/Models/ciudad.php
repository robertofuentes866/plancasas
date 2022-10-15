<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\localizacion;

class ciudad extends Model
{
    protected $table = "ciudades";
    protected $primaryKey = "id_ciudad";
    protected $fillable = ['ciudad'];
    protected $hidden = ['id_ciudad'];

    use HasFactory;

    public static function validar($request) {
        $request->validate(['ciudad'=>'required|max:25']);
    }


    public function obtenerCiudades(){
        return ciudad::all();
    }

    public function obtenerCiudadesPorId($id){
        return ciudad::find($id);
    }

    public function getId() {
        return $this->attributes['id_ciudad'];
    }

    public function getCiudad(){
        return $this->attributes['ciudad'];
    }

    public function setCiudad($ciudad) {
        $this->attributes['ciudad'] = $ciudad;
    }

}
