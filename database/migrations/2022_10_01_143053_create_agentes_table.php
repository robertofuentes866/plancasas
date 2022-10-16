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
        Schema::create('agentes', function (Blueprint $table) {
            $table->BigIncrements('id_agente');
            $table->string('nombre',50);
            $table->string('apellidos',50);
            $table->string('email',100);
            $table->string('password',250);
            $table->string('cel1',25);
            $table->string('cel2',25)->nullable();
            $table->string('foto_agente',150)->nullable();
            $table->unsignedTinyInteger('id_privilegio');
            $table->foreign('id_privilegio')->references('id_privilegio')->on('privilegios')->onDelete('restrict');
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
        Schema::dropIfExists('agentes');
    }
};
