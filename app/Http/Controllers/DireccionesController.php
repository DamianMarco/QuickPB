<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DireccionesController extends Controller
{
	public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function create()
    {
    	//dd('Hola esto es un message box');
        return view('admin.addresses.create');
    }


    public function store(DireccionRequest $request)
    {
        $address = new Direccion($request -> all());  
        //dd($request -> all());
        $address -> save();
        Flash::overlay('Direccion de facturacion almacenada correctamente','Direccion creado');

        return redirect()->route('addresses.create');
    }
}
