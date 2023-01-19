<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('agentes')->insert(array(
            "nombre" => "Administrador",
            "apellidos"=> "Admin Admin",
            "email"=> "example@example.com",
            "password"=> bcrypt(123456),
            "cel1"=> "505 88888888",
            "id_privilegio"=> 11,
            "created_at"=> date("Y-m-d H:m:s"),
            "updated_at"=> date("Y-m-d H:m:s")
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("agentes")->where("nombre","=","Administrador")->delete();
    }
};

