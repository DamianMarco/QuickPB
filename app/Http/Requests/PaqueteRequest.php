<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaqueteRequest extends Request
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
            'usuario_id'=>'required',
            'folio'=>'max:50|required',
            'proveedor'=>'max:100|required',
            'alto'=>'required',
            'largo'=>'required',            
            'ancho'=>'required',            
            'peso'=>'required',            
            'estatus'=>'required',            
            'tipoPaquete'=>'required',
            'contenido'=>'max:250|required',
            'costo'=>'required',
            'observaciones'=>'max:250',            
        ];
    }
}
