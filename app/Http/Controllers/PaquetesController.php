<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Paquete;
use App\Usuario;
use App\Http\Requests\PaqueteRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PaquetesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function view()
     {
     	//$pacs = DB::table('paquetes')->where('usuario_id', $id)->get(); //App\Paquetes::where('usuario_id', $id)->get();
        $user = Auth::user();

		$pacs = Paquete::where('usuario_id', $user->id)->orderBy('id','ASC')->paginate(5);
		$pacs->each(function($pacs){
			$pacs -> usuario;
		});
		
     	//dd($pacs);
        return view('admin.packages.view')->with('packages', $pacs);
     }

    /*retornar los paquedes paginados 5 en 5
     public function getIndex ()
     {
       // $pacs = Paquete::orderBy('id','ASC')->paginate(5);

       // return view ('admin.paquetes.index') -> with('pacs',$pacs)
     }/*/

    public function create()
    {
        $user = Auth::user();        

        
        
        return view('admin.packages.create')->with('paquete',null);
        //return view('admin.addresses.create');
    }

    public function store(PaqueteRequest $request)
    {     
        //Este es el administrador   
        $user = Auth::user();        

        $paquete = new Paquete($request -> all());

        //dd($paquete);

        $asignarA = Usuario::where('id', $paquete->usuario_id)->first();
        
        //dd($asignarA->nombreUsuario);               
                    
        $paquete->save();

        Flash::overlay('El paquete '.$paquete->folio.' ha sido asignado a '.$asignarA->nombreUsuario,'Paquete asignado');
        
        
        return redirect()->route('packages.create');        
    }

    public function edit($id)
    {             
        //Este es el administrador   
        $user = Auth::user();        

        $paquete = Paquete::where('id', $id)->first();;

        //dd($paquete);        
                
        return view('admin.packages.create')->with('paquete',$paquete);        
    }


    public function update(PaqueteRequest $request)
    {
        $input = $request->all();

        //dd($input);

        $paquete = Paquete::findOrFail($input["id"]);        

        //dd($paquete);

        $paquete->fill($input)->save();

         Flash::overlay('El paquete '.$paquete->folio.' ha sido actualizado','Paquete actualizado');

        return redirect()->back();
    }

    public function take($usuario_id,$nombreUsuario)
    {             
        //Este es el administrador   
        $user = Auth::user();        


        //dd($paquete);        
                
        return view('admin.packages.create')->with('paquete',null)->with('usuario_id',$usuario_id)->with('nombreUsuario',$nombreUsuario);        
    }


     
}
