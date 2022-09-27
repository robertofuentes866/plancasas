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
            $table->increments('id_terreno');
            $table->float('area_terreno');
            $table->string('tamano',25);
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('cascade');
            $table->integer('id_localizacion')->unsigned();
            $table->foreign('id_localizacion')->references('id_localizacion')->on('localizaciones')->onDelete('cascade');
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
