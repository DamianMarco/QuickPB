<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
	protected $table = "Direcciones";

    protected $fillable = [
	    'nombre',
	    'apellidoPaterno',
	    'apellidoMaterno',
	    'telefono',
	    'calle',
	    'numero',
	    'numerointerior',
	    'entreCalles', 
	    'ciudadMunicipio',
	    'estado',
	    'pais', 
	    'codigoPostal',
	    'tipo'
    ];

	public function Usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

}
