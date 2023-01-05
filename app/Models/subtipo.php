<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subtipo extends Model
{
    use HasFactory;

    protected $primaryKey = "id_subtipo";

    public static function validar($request) {
        $request->validate(['subtipo'=>'required|max:40']);
    }

    public function getIdSubtipo(){
        return $this->attributes['id_subtipo'];
    }

    public function setSubTipo($sub){
        $this->attributes['subtipo'] = $sub;
    }
}
