<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('usuario_id')->unasigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->string('nombre', 100);
            $table->string('apellidoPaterno', 50);
            $table->string('apellidoMaterno', 50);
            $table->string('telefono', 60);
            $table->string('calle', 60);
            $table->smallInteger('numero');
            $table->string('numerointerior', 10)->nullable();
            $table->string('entreCalles', 100)->nullable();
            $table->string('ciudadMunicipio', 60);
            $table->string('estado', 60);
            $table->string('pais', 60);
            $table->string('codigoPostal', 60);
            
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
        Schema::drop('direcciones');
    }
}
