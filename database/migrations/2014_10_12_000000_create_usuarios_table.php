<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('nombreUsuario')->unique();
            $table->string('password');
            $table->enum('estatus',['activo','inactivo','bloqueado','baja']) -> default('activo');
            $table->enum('rol',['cliente','admin','operador']) -> default('cliente');
            $table->string('telefono');
            $table->string('img_Ife',255);
            $table->rememberToken();
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
        Schema::drop('usuarios');
    }
}
