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
        Schema::create('favoritos_terrenos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_terreno');
            $table->unsignedBigInteger('id_usuario');
            $table->primary(['id_terreno','id_usuario']);
            $table->foreign('id_terreno')->references('id_terreno')->on('terrenos')->onDelete('restrict');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('restrict');
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
        Schema::dropIfExists('favoritos_terrenos');
    }
};
