<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "Facturas";

    protected $fillable = [
	    'img_factura'
    ];


    public function Paquete()
    {
        return $this->belongsTo('App\Paquete');
    }
}
