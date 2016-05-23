<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Direccion;
use Laracasts\Flash\Flash;
use App\Http\Requests\DireccionRequest;
use Auth;

class DireccionesController extends Controller
{
	public function __construct()
    {
       $this->middleware('auth');

    }
    
    public function create()
    {
        $user = Auth::user();
        $envio = Direccion::where('usuario_id', $user->id)->where('tipo','envio')->get();
        $facturacion = Direccion::where('usuario_id', $user->id)->where('tipo','facturacion')->get();    

        $data=array(
        'envio'=>$envio, 'facturacion'=>$facturacion
        );

    	
        return view('admin.addresses.create')->with($data);
        //return view('admin.addresses.create');
    }


    public function store(DireccionRequest $request)
    {        
        $user = Auth::user();
        $address = new Direccion($request -> all());  

        $direccion = Direccion::where('usuario_id', $user->id)->where('tipo',$address->tipo)->first();

        if (is_null($direccion))
        {                    
            $address ->usuario_id=$user->id;
            $address -> save();

            Flash::overlay('Dirección de '.$address->tipo.' almacenada correctamente','Dirección guardada');
        }
        else
        {
                       
            $new_direccion = $request -> all();
            $direccion->fill($new_direccion);
            $direccion->save();

            Flash::overlay('Dirección de '.$direccion->tipo.' actualizada correctamente','Dirección actualizada');
            
        }
        

        //return view('admin.addresses.view');        
        return redirect()->route('addresses.view');
        //Controller::call('create()');
       // $this->create();
        //$direcciones=array(
        //'envio'=>$envio, 'facturacion'=>$facturacion
        //);

        
        //return view('admin.addresses.create');
        //return View::make('admin.addresses.create')->with('envio',$envio)->with('facturacion',$facturacion);
    }


    public function edit($tipo)
    {
        $user = Auth::user();
        // get the nerd
        $direccion = Direccion::where('usuario_id', $user->id)->where('tipo',$tipo);

        // show the edit form and pass the nerd
        return View::make('admin.addresses.edit')
            ->with('direccion', $direccion);
    }
}
