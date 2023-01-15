<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class authAdmin extends Authenticatable {
    use Notifiable;

    protected $table = 'agentes';
    protected $primaryKey = 'id_agente';
    protected $fillable = ['email','password','nombre','apellidos','cel1','cel2'];
    protected $hidden = ['password'];

}
