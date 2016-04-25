<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests;
use Auth;
use App\Paquete;
use App\Usuario;
use App\Factura;
use App\Http\Requests\PaqueteRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Validator;


class PaquetesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function packagesview()
     {
     	//$pacs = DB::table('paquetes')->where('usuario_id', $id)->get(); //App\Paquetes::where('usuario_id', $id)->get();
        $user = Auth::user();

    		$pacs = Paquete::where('usuario_id', $user->id)->orderBy('id','ASC')->paginate(5);
    		$pacs->each(function($pacs){
    			$pacs -> usuario;
          $pacs -> factura;
    		});
  		
     	//dd($pacs->all());
        return view('admin.packages.packagesview')->with('packages', $pacs);
     }

     public function storeimage(Request $request)
     {
       if(Request::ajax()) {
          $user = Auth::user();
          $factura = new Factura();
          $data = Request::all();

          $factura->paquete_id = $data['paquete_id'];  
                
          $file = $data['userfile'];

          // Build the input for validation
          $fileArray = array('image' => $file);

          // Tell the validator that this file should be an image
          $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif,bmp|required|max:10000' // max 10000kb
          );

          // Now pass the input and rules into the validator
          $validator = Validator::make($fileArray, $rules);

          // Check to see if validation fails or passes
          if ($validator->fails())
          {
             return response()->json([
                          "success"=>"false", "mensaje"=>'Debe de seleccionar un archivo de tipo imagen que cumpla con lo siguiente: archivo de tipo jpeg/gif/png/bmp con un peso m&aacute;ximo de 10000kb'
                      ], 200);
          }
          else
          {

              $name = $user->nombreUsuario . time() . '.' . $file->getClientOriginalExtension();
              $path = public_path() . '/images_bills/';
              $file-> move($path, $name);
              $factura ->img_PathFactura = '/images_bills/' . $name;
                  
              $factura->save();


              return response()->json([
                          "success"=>"true", "mensaje"=>'Se ha enviado la imagen seleccionada correctamente, la factura sera revisada y posteriormente recibiras un correo con mas informaci&oacute;n', "filename" =>  asset(''). '/images_bills/' .$name
                      ], 200);
          }
        }

        return response()->json(["success"=>"true"]);
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
