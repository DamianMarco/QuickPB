<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
	protected $table = "pagos";

    protected $fillable = [
	    'referencia',
	    'descripcion',
	    'titular',
	    'numeroTarjeta',
	    'monto',
	    'codigoAutorizacion',
	    'estatus'
    ];

	public function Usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function Paquete()
    {
        return $this->belongsTo('App\Paquete');
    }

}