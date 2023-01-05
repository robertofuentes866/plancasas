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
        Schema::create('subtipos', function (Blueprint $table) {
            $table->unsignedTinyInteger('id_tipo');
            $table->unsignedTinyInteger('id_subtipo');
            $table->string('subtipo',40);
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('restrict');
            $table->primary(['id_tipo','id_subtipo']);
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
        Schema::dropIfExists('subtipos');
    }
};
