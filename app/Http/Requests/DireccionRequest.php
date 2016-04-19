<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DireccionRequest extends Request
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
            'nombre'=>'max:50|required',
            'apellidoPaterno'=>'max:50|required',
            'apellidoMaterno'=>'max:50|required',
            'calle'=>'max:60|required',            
            'telefono'=>'max:60|required',            
            'numero'=>'required',            
            'numerointerior'=>'max:10', 
            'entreCalles'=>'max:100',                       
            'ciudadMunicipio'=>'max:60|required',
            'estado'=>'max:60|required',
            'pais'=>'max:60|required',
            'codigoPostal'=>'max:60|required',
        ];
    }
}
