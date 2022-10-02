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
        Schema::create('precios_bodegas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedTinyInteger('id_ofrecimiento');
            $table->unsignedTinyInteger('id_duracion');
            $table->unsignedTinyInteger('id_recurso');
            $table->foreign('id_bodega')->references('id_bodega')->on('bodegas')->onDelete('restrict');
            $table->foreign('id_ofrecimiento')->references('id_ofrecimiento')->on('ofrecimientos')->onDelete('restrict');
            $table->foreign('id_duracion')->references('id_duracion')->on('duraciones')->onDelete('restrict');
            $table->foreign('id_recurso')->references('id_recurso')->on('recursos')->onDelete('restrict');
            $table->integer('valor')->unsigned();
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
        Schema::dropIfExists('precios_bodegas');
    }
};
