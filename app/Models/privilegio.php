<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privilegio extends Model
{
    use HasFactory;

    protected $table = 'privilegios';
    protected $fillable = ['nombre','select','insert','update','delete'];
    protected $hidden = ['id_privilegio'];
    protected $primaryKey = "id_privilegio";

    public static function validar($request) {
        $request->validate(['nombre'=>'required|max:20']);
    }


    public function obtenerPrivilegios(){
        return Privilegio::all();
    }

    public function obtenerPrivilegiosPorId($id){
        return Privilegio::find($id);
    }

    public function getId() {
        return $this->attributes['id_privilegio'];
    }

    public function getNombre(){
        return $this->attributes['nombre'];
    }

    public function setNombre($nombre) {
        $this->attributes['nombre'] = $nombre;
    }

    public function getSelect(){
        return $this->attributes['select'];
    }

    public function setSelect($select) {
        $this->attributes['select'] = $select;
    }

    public function getInsert(){
        return $this->attributes['insert'];
    }

    public function setInsert($insert) {
        $this->attributes['insert'] = $insert;
    }
    
    public function getUpdate(){
        return $this->attributes['update'];
    }

    public function setUpdate($update) {
        $this->attributes['update'] = $update;
    }
    
    public function getDelete(){
        return $this->attributes['delete'];
    }

    public function setDelete($delete) {
        $this->attributes['delete'] = $delete;
    }
}
