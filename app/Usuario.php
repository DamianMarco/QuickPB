<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Usuario extends Authenticatable implements AuthorizableContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "usuarios";


    protected $fillable = [
         'estatus','rol','estado','email', 'password','nombreUsuario','telefono','img_Ife'
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

    public function isAdmin()
    {
        return $this->rol === "admin";
    }
}
