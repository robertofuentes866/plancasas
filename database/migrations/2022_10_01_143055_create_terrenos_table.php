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
        Schema::create('terrenos', function (Blueprint $table) {
            $table->BigIncrements('id_terreno');
            $table->unsignedTinyInteger('id_tipo');
            $table->float('area_terreno');
            $table->string('tamano',25);
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('restrict');
            $table->unsignedSmallInteger('id_localizacion');
            $table->boolean('disponibilidad');
            $table->boolean('destacado');
            $table->unsignedBigInteger('id_agente');
            $table->foreign('id_agente')->references('id_agente')->on('agentes')->onDelete('restrict');
            $table->foreign('id_localizacion')->references('id_localizacion')->on('localizaciones')->onDelete('restrict');
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
        Schema::dropIfExists('terrenos');
    }
};
