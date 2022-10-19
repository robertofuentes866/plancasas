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
        Schema::create('fotos_casas', function (Blueprint $table) {
            $table->bigIncrements('id_foto');
            $table->UnsignedBigInteger('id_casa');
            $table->string('foto_normal',30)->nullable();
            $table->string('foto_thumb',30)->nullable();
            $table->string('leyenda',30)->nullable();
            $table->boolean('es_principal')->nullable();
            $table->foreign('id_casa')->references('id_casa')->on('casas')->onDelete('restrict');
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
        Schema::dropIfExists('fotos_casas');
    }
};
