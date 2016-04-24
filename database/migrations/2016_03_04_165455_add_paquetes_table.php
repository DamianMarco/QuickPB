<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('usuario_id')->unsigned();            
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            
            $table->string('folio',50)->nullable();;
            $table->string('proveedor',100)->nullable();;
            $table->float('alto');
            $table->float('ancho');
            $table->float('largo');
            $table->float('peso');
            $table->enum('estatus',['enLaredo','enCurso','enTuCiudad','enEntrega','entregado']) -> default('enLaredo');
            /*Suite=  espacio donde esta ubicado el paquete en el almacen*/
            $table->string('suite',100)->nullable();;
            $table->enum('tipoPaquete',['sobre','paquete','tubo','valija','otro']) -> default('paquete');
            $table->string('contenido',255)->nullable();;
            $table->float('costo')->nullable();;
            $table->text('observaciones')->nullable();;
            $table->enum('enviarPaquete',['enEspera','enCotizacion','Cotizada','Aceptada']) -> default('enEspera');
            $table->timestamps();

           
        });
/*
        Schema::create('paquetes_usuarios', function (Blueprint $table) {
            $table->increments('id'); 
            
            $table->integer('id_paquete')->unsigned();
            $table->integer('id_usuario')->unsigned();

            $table->foreign('id_paquete')->references('id')->on('paquetes');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paquetes');
    }
}
