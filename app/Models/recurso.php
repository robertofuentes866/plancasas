<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recurso extends Model
{
    use HasFactory;

    protected $table = 'recursos';
    protected $fillable = ['recurso'];
    protected $hidden = ['id_recurso'];
    protected $primaryKey = "id_recurso";


    public function obtenerRecursos(){
        return recurso::all();
    }

    public function obtenerRecursosPorId($id){
        return recurso::find($id);
    }

    public function getId() {
        return $this->attributes['id_recurso'];
    }

    public function getRecurso(){
        return $this->attributes['recurso'];
    }

    public function setRecurso($recurso) {
        $this->attributes['recurso'] = $recurso;
    }
}
