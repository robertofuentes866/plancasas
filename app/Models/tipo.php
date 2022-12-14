<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $fillable = ['tipo'];
    protected $hidden = ['id_tipo'];
    protected $primaryKey = "id_tipo";

    public static function validar($request) {
        $request->validate(['tipo'=>'required|max:20']);
    }


    public function obtenerTipos(){
        return Tipo::all();
    }

    public function obtenerTiposPorId($id){
        return Tipo::find($id);
    }

    public function getId() {
        return $this->attributes['id_tipo'];
    }

    public function getTipo(){
        return $this->attributes['tipo'];
    }

    public function setTipo($tipo) {
        $this->attributes['tipo'] = $tipo;
    }
    
}
