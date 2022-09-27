<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localizacion extends Model
{
    protected $table="localizaciones";
    protected $primaryKey="id_localizacion";

    use HasFactory;

}
