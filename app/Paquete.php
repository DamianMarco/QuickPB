<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = "paquetes";

    protected $fillable = [
    	'usuario_id',
        'folio',
    	'proveedor',
		'alto',
	    'ancho',
	    'largo',
	    'peso',
	    'estatus',
	    'suite',
	    'tipoPaquete',
	    'contenido',
	    'costo',
	    'observaciones',
	    'enviarPaquete'
    ];      

    public function Usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function Factura()
    {
        return $this->hasOne('App\Factura');
    }
}
