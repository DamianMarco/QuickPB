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
	    'tipoPaquete',
	    'contenido',
	    'costo',
        'costoEnvio',
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
