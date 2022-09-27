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


    public function obtenerTipos(){
        return Tipo::all();
    }

    public function obtenerTiposPorId($id){
        return Tipo::find($id);
    }
    
}
