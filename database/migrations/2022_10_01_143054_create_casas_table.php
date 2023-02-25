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
            $table->unsignedTinyInteger('plantas')->nullable();
            $table->unsignedTinyInteger('garage')->nullable();
            $table->string('casaNumero',30);
            $table->float('area_construccion')->nullable()->default(0);
            $table->float('area_terreno')->nullable()->default(0);
            $table->unsignedTinyInteger('habitaciones')->nullable()->default(0);
            $table->unsignedTinyInteger('banos')->nullable()->default(0);
            $table->unsignedTinyInteger('bano_social')->nullable()->default(0);
            $table->boolean('piscina')->nullable();
            $table->boolean('disponibilidad')->nullable();
            $table->boolean('destacado')->nullable();
            $table->year('ano_construccion')->nullable()->default(0);
            $table->unsignedTinyInteger('aires_acondicionado')->nullable()->default(0);
            $table->unsignedTinyInteger('abanicos_techo')->nullable()->default(0);
            $table->boolean('agua_caliente')->nullable();
            $table->boolean('tanque_agua')->nullable();
            $table->boolean('sistema_seguridad')->nullable();
            $table->unsignedBigInteger('id_agente');
            $table->foreign('id_agente')->references('id_agente')->on('agentes')->onDelete('restrict');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('restrict');
            $table->unsignedSmallInteger('id_localizacion');
            $table->unsignedtinyInteger('id_subtipo');
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
        Schema::dropIfExists('casas');
    }
};
