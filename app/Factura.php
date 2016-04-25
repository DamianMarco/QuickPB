<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "Facturas";

    protected $fillable = [
	    'img_PathFactura','paquete_id'
    ];


    public function Paquete()
    {
        return $this->belongsTo('App\Paquete');
    }
}
