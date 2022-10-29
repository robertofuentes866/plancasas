<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casa extends Model
{
    protected $table = "casas";
    protected $primaryKey = "id_casa";
    protected $fillable = ["id_agente","id_tipo","id_localizacion","id_recurso","casaNumero","area_construccion",
    "area_terreno","plantas","garage","habitaciones","banos","piscina","apartamento","cuartoDomestica",
   "bano_social","disponibilidad","destacado","ano_construccion"];
    protected $hidden = ['id_casa'];
    
    use HasFactory;

    public static function validar($request) {
        $request->validate(['plantas'=>'max:2',
                            'casaNumero'=>'max:30',
                            'garage'=>'max:3',
                             'area_construccion'=>'numeric',
                             'area_terreno'=>'numeric',
                             'habitaciones'=>'max:2',
                            'banos'=>'max:2',
                            'ano_construccion'=>'numeric',
                             'id_agente'=>'required',
                             'id_localizacion'=>'required',
                             'id_recurso'=>'required',
                            'id_tipo'=>'required']);
    }


    public function obtenerCasas(){
        return casa::all();
    }

    public function obtenerCasaPorId($id){
        return casa::find($id);
    }

    public function getId() {
        return $this->attributes['id_casa'];
    }

    public function setId($id) {
        $this->attributes['id_casa'] = $id;
    }


    public function getCasaNumero() {
        return $this->attributes['casaNumero'];
    }

    public function setCasaNumero($id) {
        $this->attributes['casaNumero'] = $id;
    }

    public function getIdTipo(){
        return $this->attributes['id_tipo'];
    }

    public function setIdTipo($id_tipo) {
        $this->attributes['id_tipo'] = $id_tipo;
    }

    public function getIdAgente(){
        return $this->attributes['id_agente'];
    }

    public function setIdAgente($id_agente) {
        $this->attributes['id_agente'] = $id_agente;
    }

    public function getIdLocalizacion(){
        return $this->attributes['id_localizacion'];
    }

    public function setIdLocalizacion($id_localizacion) {
        $this->attributes['id_localizacion'] = $id_localizacion;
    }

    public function getIdRecurso(){
        return $this->attributes['id_recurso'];
    }

    public function setIdRecurso($id_recurso) {
        $this->attributes['id_recurso'] = $id_recurso;
    }

    public function getPlantas() {
        return $this->attributes['plantas'];
    }

    public function setPlantas($plantas) {
        $this->attributes['plantas'] = $plantas;
    }

    public function getGarage() {
        return $this->attributes['garage'];
    }

    public function setGarage($garage) {
        $this->attributes['garage'] = $garage;
    }
 
    public function getAreaConstruccion() {
        return $this->attributes['area_construccion'];
    }

    public function setAreaConstruccion($ac) {
        $this->attributes['area_construccion'] = $ac;
    }
    public function getAreaTerreno() {
        return $this->attributes['area_terreno'];
    }

    public function setAreaTerreno($at) {
        $this->attributes['area_terreno'] = $at;
    }

    public function getHabitaciones() {
        return $this->attributes['habitaciones'];
    }

    public function setHabitaciones($hab) {
        $this->attributes['habitaciones'] = $hab;
    }
    public function getBanos() {
        return $this->attributes['banos'];
    }

    public function setBanos($banos) {
        $this->attributes['banos'] = $banos;
    }

    public function getAnoConstruccion(){
        return $this->attributes['ano_construccion'];
    }

    public function setAnoConstruccion($ac) {
        $this->attributes['ano_construccion'] = $ac;
    }

    public function getBanoSocial() {
        return $this->attributes['bano_social'];
    }

    public function setBanoSocial($bs) {
        $this->attributes['bano_social'] = $bs;
    }

    public function getPiscina(){
        return $this->attributes['piscina'];
    }

    public function setPiscina($piscina) {
        $this->attributes['piscina'] = $piscina;
    }

    public function getDisponibilidad(){
        return $this->attributes['disponibilidad'];
    }

    public function setDisponibilidad($disp) {
        $this->attributes['disponibilidad'] = $disp;
    }

    public function getApartamento(){
        return $this->attributes['apartamento'];
    }

    public function setApartamento($apto) {
        $this->attributes['apartamento'] = $apto;
    }

    public function getDestacado(){
        return $this->attributes['destacado'];
    }

    public function setDestacado($dest) {
        $this->attributes['destacado'] = $dest;
    }

    public function getCuartoDomestica(){
        return $this->attributes['cuartoDomestica'];
    }

    public function setCuartoDomestica($cd) {
        $this->attributes['cuartoDomestica'] = $cd;
    }

}
