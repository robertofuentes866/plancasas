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
            $table->string('nombre',20);
            $table->string('apellidos',20);
            $table->string('email',50);
            $table->string('password',100);
            $table->string('cel1',20);
            $table->string('cel2',20);
            $table->string('foto_agente',150);
            $table->unsignedTinyInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('restrict');
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
