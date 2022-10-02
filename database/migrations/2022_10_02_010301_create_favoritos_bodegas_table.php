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
        Schema::create('favoritos_bodegas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedBigInteger('id_usuario');
            $table->primary(['id_bodega','id_usuario']);
            $table->foreign('id_bodega')->references('id_bodega')->on('bodegas')->onDelete('restrict');
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
        Schema::dropIfExists('favoritos_bodegas');
    }
};
