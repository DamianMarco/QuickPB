<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            //$table->integer('usuario_id'); 
            $table->integer('usuario_id')->unsigned();
            
            // relacionar con paquete
            $table->integer('paquete_id');
            //$table->integer('paquete_id')->unsigned();

            $table->string('referencia',100);
            $table->string('descripcion',100);
            $table->string('titular', 100);
            $table->string('numeroTarjeta', 50);
            $table->decimal('monto', 10,2);
            $table->integer('codigoAutorizacion');
            $table->string('estatus');            
            
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            //$table->foreign('paquete_id')->references('id')->on('paquetes');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagos');
    }
}
