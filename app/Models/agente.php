<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agente extends Model
{
    protected $table = "agentes";
    protected $primaryKey = "id_agente";
    protected $fillable = ['id_privilegio','nombre','apellidos','email','password','cel1','cel2','foto_agente'];
    protected $hidden = ['id_privilegio','id_agente'];
    
    use HasFactory;

    public static function validar($request) {
        $request->validate(['nombre'=>'required|max:50',
                            'apellidos'=>'required|max:50',
                             'email'=>'required|email|max:100',
                             'password'=>'required|max:250',
                            'cel1'=>'max:25',
                            'cel2'=>'max:25',
                            'foto_agente'=>'mimes:jpg,png,bmp,jpeg',
                             'id_privilegio'=>'required']);
    }


    public function obtenerAgentes(){
        return agente::all();
    }

    public function obtenerAgentePorId($id){
        return agente::find($id);
    }

    public function getId() {
        return $this->attributes['id_agente'];
    }

    public function setId($id) {
        $this->attributes['id_agente'] = $id;
    }

    public function getIdPrivilegio(){
        return $this->attributes['id_privilegio'];
    }

    public function setIdPrivilegio($id_privilegio) {
        $this->attributes['id_privilegio'] = $id_privilegio;
    }

    public function getNombre() {
        return $this->attributes['nombre'];
    }

    public function setNombre($nombre) {
        $this->attributes['nombre'] = $nombre;
    }

    public function getApellidos() {
        return $this->attributes['apellidos'];
    }

    public function setApellidos($apellidos) {
        $this->attributes['apellidos'] = $apellidos;
    }
 
    public function getEmail() {
        return $this->attributes['email'];
    }

    public function setEmail($email) {
        $this->attributes['email'] = $email;
    }
    public function getPassword() {
        return $this->attributes['password'];
    }

    public function setPassword($pw) {
        $this->attributes['password'] = $pw;
    }

    public function getCel1() {
        return $this->attributes['cel1'];
    }

    public function setCel1($cel1) {
        $this->attributes['cel1'] = $cel1;
    }
    public function getCel2() {
        return $this->attributes['cel2'];
    }

    public function setCel2($cel2) {
        $this->attributes['cel2'] = $cel2;
    }
    public function getFotoAgente() {
        return $this->attributes['foto_agente'];
    }

    public function setFotoAgente($ft) {
        $this->attributes['foto_agente'] = $ft;
    }
}

