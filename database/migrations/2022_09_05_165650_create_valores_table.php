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
        Schema::create('valores', function (Blueprint $table) {
            $table->integer('id_prop')->unsigned();
            $table->integer('id_tipo')->unsigned();
            $table->integer('id_ofrecimiento')->unsigned();
            $table->integer('id_duracion')->unsigned();
            $table->foreign('id_prop')->references('id_casa')->on('casas')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('cascade');
            $table->foreign('id_ofrecimiento')->references('id_ofrecimiento')->on('ofrecimientos')->onDelete('cascade');
            $table->foreign('id_duracion')->references('id_duracion')->on('duraciones')->onDelete('cascade');
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
        Schema::dropIfExists('valores');
    }
};
