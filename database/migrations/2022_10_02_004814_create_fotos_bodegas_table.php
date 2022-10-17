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
        Schema::create('fotos_bodegas', function (Blueprint $table) {
            $table->bigIncrements('id_foto');
            $table->UnsignedBigInteger('id_bodega');
            $table->string('foto_normal',150)->nullable();
            $table->string('foto_thumb',150)->nullable();
            $table->string('leyenda',30)->nullable();
            $table->boolean('es_principal')->nullable();
            $table->foreign('id_bodega')->references('id_bodega')->on('bodegas')->onDelete('restrict');
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
        Schema::dropIfExists('fotos_bodegas');
    }
};
