<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->BigIncrements('id_casa');
            $table->unsignedTinyInteger('id_tipo');
            $table->char('plantas',2);
            $table->char('garage',3);
            $table->float('area_construccion');
            $table->float('area_terreno');
            $table->char('habitaciones',2);
            $table->char('banos',2);
            $table->char('bano_social',1);
            $table->boolean('piscina');
            $table->boolean('disponibilidad');
            $table->boolean('apartamento');
            $table->boolean('destacado');
            $table->year('ano_construccion');
            $table->unsignedBigInteger('id_agente');
            $table->foreign('id_agente')->references('id_agente')->on('agentes')->onDelete('restrict');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('restrict');
            $table->unsignedSmallInteger('id_localizacion');
            $table->foreign('id_localizacion')->references('id_localizacion')->on('localizaciones')->onDelete('restrict');
            $table->unsignedTinyInteger('id_recurso');
            $table->foreign('id_recurso')->references('id_recurso')->on('recursos')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casas');
    }
};
