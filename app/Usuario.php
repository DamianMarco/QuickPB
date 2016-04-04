<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "usuarios";


    protected $fillable = [
         'estatus','rol','estado','email', 'password','nombreUsuario'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Direccion()
    {
        return $this->hasOne('App\Direccion');
    }

    public function Paquetes()
    {
        return $this->hasMany('App\Paquete');
    }    
}
