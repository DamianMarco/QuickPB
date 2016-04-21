<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('paquete_id')->unsigned();

            //$table->binary('img_factura');
            $table->string('img_PathFactura',255);
            $table->timestamps();

            $table->foreign('paquete_id')->references('id')->on('paquetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas');
    }
}
