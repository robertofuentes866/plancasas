<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofrecimiento extends Model
{
    use HasFactory;

    protected $table = 'ofrecimientos';
    protected $fillable = ['ofrecimiento'];
    protected $hidden = ['id_ofrecimiento'];
    protected $primaryKey = "id_ofrecimiento";


    public function obtenerOfrecimientos(){
        return ofrecimiento::all();
    }

    public function obtenerRecursosPorId($id){
        return ofrecimiento::find($id);
    }

    public function getId() {
        return $this->attributes['id_ofrecimiento'];
    }

    public function getOfrecimiento(){
        return $this->attributes['ofrecimiento'];
    }

    public function setOfrecimiento($ofrecimiento) {
        $this->attributes['ofrecimiento'] = $ofrecimiento;
    }
}
