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
            $table->increments('id_casa');
            $table->integer('plantas');
            $table->integer('garage');
            $table->float('area_construccion');
            $table->float('area_terreno');
            $table->integer('habitaciones');
            $table->integer('banos');
            $table->boolean('piscina');
            $table->boolean('disponibilidad');
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('cascade');
            $table->integer('id_localizacion')->unsigned();
            $table->foreign('id_localizacion')->references('id_localizacion')->on('localizaciones')->onDelete('cascade');
            $table->integer('id_recurso')->unsigned();
            $table->foreign('id_recurso')->references('id_recurso')->on('recursos')->onDelete('cascade');
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
