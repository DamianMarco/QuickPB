<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombreUsuario'=>'min:6|max:120|required|without_spaces|unique:usuarios',
            'password' => 'required|min:6|max:20',
            'email' => 'required|email|unique:usuarios',
            'telefono'=> 'required|max:20'            
        ];
    }
}
