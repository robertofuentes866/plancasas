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
        Schema::create('precios_casas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_casa');
            $table->unsignedTinyInteger('id_ofrecimiento');
            $table->unsignedTinyInteger('id_duracion');
            $table->unsignedTinyInteger('id_recurso');
            $table->boolean('disponibilidad')->nullable();
            $table->foreign('id_casa')->references('id_casa')->on('casas')->onDelete('restrict');
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
        Schema::dropIfExists('precios_casas');
    }
};
