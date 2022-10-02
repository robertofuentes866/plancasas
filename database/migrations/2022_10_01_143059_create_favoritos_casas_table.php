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
        Schema::create('favoritos_casas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_casa');
            $table->unsignedBigInteger('id_usuario');
            $table->primary(['id_casa','id_usuario']);
            $table->foreign('id_casa')->references('id_casa')->on('casas')->onDelete('restrict');
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
        Schema::dropIfExists('favoritos_casas');
    }
};
