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
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->smallIncrements('id_localizacion');
            $table->string('residencial',35);
            $table->string('direccion',100)->nullable();
            $table->text('descripcion');
            $table->unsignedTinyInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('restrict');
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
        Schema::dropIfExists('localizacion');
    }
};
