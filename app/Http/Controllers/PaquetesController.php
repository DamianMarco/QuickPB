<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;
use App\Paquete;
use App\Usuario;
use App\Factura;
use App\Direccion;
use App\Http\Requests\PaqueteRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Validator;
use File;

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
        
        if($user->rol == 'admin')
    		    $pacs = Paquete::orderBy('updated_at','DESC')->paginate(5);
        else
            $pacs = Paquete::where('usuario_id', $user->id)->orderBy('updated_at','DESC')->paginate(5);
        

    		$pacs->each(function($pacs){
    			$pacs -> usuario;
          $pacs -> factura;
    		});
  		
     	//dd($pacs->all());
        return view('admin.packages.packagesview')->with('packages', $pacs);
     }

    public function view()
    {            

        $user = Auth::user();

        return view('admin.packages.view');
    }

     public function apiList(Request $request)
     {
        $params = $request->all();        

        $sort = (isset($params['sort']))?$params['sort']:array();
        $rowCount = (isset($params['rowCount']))?$params['rowCount']:10;
        $current = (isset($params['current']))?$params['current']:1;
        $searchPhrase = (isset($params['searchPhrase'])) ? $params['searchPhrase'] : '';

        $take = ($rowCount <> 10) ? $rowCount : 10;
        $skip = ($current > 1) ? $current-1 : 0;

        $packages = Paquete::where('usuario_id','like', '%'.$searchPhrase.'%')->orWhere('folio','like', '%'.$searchPhrase.'%')->orWhere('contenido','like', '%'.$searchPhrase.'%')->orWhere('observaciones','like', '%'.$searchPhrase.'%')->take($take)->skip($skip)->get();

        if(count($sort)>0)
        {
            $sortBy = array_keys($sort);
            $direction = $sort[$sortBy[0]];
            
            if ($direction=="asc")
                $packages = $packages->sortBy($sortBy[0]);
            else
                $packages = $packages->sortByDesc($sortBy[0]);   
        }

        $rows = [];
        foreach($packages as $row) {
     
            $rows[] = array(
                'usuario_id' => $row->usuario_id,
                'folio' => $row->folio,
                'proveedor'=> $row->proveedor,
                'alto'=> $row->alto,
                'ancho'=> $row->ancho,
                'largo'=> $row->largo,
                'peso'=> $row->peso,
                'estatus'=> $row->estatus,
                'suite'=> $row->suite,
                'tipoPaquete'=> $row->tipoPaquete,
                'contenido'=> $row->contenido,
                'costo'=> $row->costo,
                'observaciones'=> $row->observaciones,
                'enviarPaquete'=> $row->enviarPaquete
            );
        }
     
        $data = array(
            'current' => $skip,
            'rowCount' => $take,
            'rows' => $rows,
            'total' => count($packages),
        );
     
        return json_encode($data);
     }

     public function removecotizacion(Request $request)
     {
        if($request->ajax()) {

          $data = $request->all();
          $paquete_id = $data['paquete_id'];  
                
          $miPaquete = Paquete::where('id', $paquete_id)->first();

          $miPaquete->enviarPaquete = "enEspera";
          $miPaquete->costoEnvio = 0;
          $miPaquete->save();

          $facturaEnBD = Factura::where('paquete_id', $paquete_id)->first();

           if(File::exists(public_path() . $facturaEnBD ->img_PathFactura))
               File::delete(public_path() . $facturaEnBD ->img_PathFactura );

          $facturaEnBD->delete();

            return response()->json([
                          "success"=>"true", "mensaje"=>'! Se ha rechazado el costo por envi&oacute; de manera exitosa !'
                      ], 200);

        }

     }

     public function storeimage(Request $request)
     {
       if($request->ajax()) {
        ini_set('max_execution_time', 300);
          $user = Auth::user();
          $factura = new Factura();
          $data = $request->all();

          $factura->paquete_id = $data['paquete_id'];  
                
          $file = $data['userfile'];

          $user->direccion;
          $miPaquete = Paquete::where('id', $factura->paquete_id)->first();

          if($miPaquete->enviarPaquete != "enEspera" && $miPaquete->enviarPaquete != "enCotizacion")
          {
              return response()->json([
                      "success"=>"false", "mensaje"=>'Ya <strong>No</strong> puedes actualizar tu factura.'
                  ], 200);
          }

          if(is_null($user->direccion))
          {
             return response()->json([
                          "success"=>"false", "mensaje"=>'Debe registrar su direcci&oacute;n de <strong>Env&iacute;o</strong> que ser&aacute; donde <strong>reciba su paquete</strong>.'
                      ], 200);
          }
          else
          {
            /*$dirFactura = Direccion::where('usuario_id',$user->id)->where('tipo','facturacion')->first();*/
            $dircasa = Direccion::where('usuario_id',$user->id)->where('tipo','envio')->first();

              if(is_null($dircasa))
              {
                 return response()->json([
                          "success"=>"false", "mensaje"=>'Debe registrar su direcci&oacute;n de <strong>Env&iacute;o</strong> que ser&aacute; donde <strong>reciba su paquete</strong>.'
                      ], 200);
              }
          }
        
          // Build the input for validation
          $fileArray = array('image' => $file);

          // Tell the validator that this file should be an image
          $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif,bmp,pdf|required|max:50000' // max 10000kb
          );

          // Now pass the input and rules into the validator
          $validator = Validator::make($fileArray, $rules);

          // Check to see if validation fails or passes
          if ($validator->fails())
          {
             return response()->json([
                          "success"=>"false", "mensaje"=>'La factura o imagen/foto deber&aacute; cumplir con: <br> Formato (jpeg/gif/png/bmp/pdf) <br> Peso m&aacute;ximo de 50000kb'
                      ], 200);
          }
          else
          {
              $administradores = Usuario::where('rol','=', 'admin')->where('estatus','=', 'activo')->get();
              $emailsAdmin = $administradores->pluck('email')->toArray();

              $name = $user->nombreUsuario . time() . '.' . $file->getClientOriginalExtension();
              $path = public_path() . '/images_bills/';
              //dd($path);
              $file-> move($path, $name);
              $factura ->img_PathFactura = '/images_bills/' . $name;

              $facturaEnBD = Factura::where('paquete_id', $factura->paquete_id)->first();
            

              $data = array( 'name' => $user->nombreUsuario, 'correoUsuario'=> $user->email, 'idUsuario' => $user->id, 'folio' => $miPaquete->folio, 'pathFile' => public_path() . $factura->img_PathFactura, 'copias' => $emailsAdmin);

              if (is_null($facturaEnBD))
              {  
                $factura->save();
                $miPaquete->enviarPaquete = 'enCotizacion';
                $miPaquete->updated_at = date('Y-m-d H:i:s');
                $miPaquete->save();
                 Mail::queue('emails.enviofactura', $data, function($message) use ($data)
                 {                   
                  //psw:adminqpbox2016
                    $message->to('facturas@quickpobox.com')->cc($data['copias'])->subject('Nueva Factura de Paquetes');
                    $message->attach($data['pathFile']);
                 });

                  Mail::queue('emails.enviofacturatouser', $data, function($message) use ($data)
                 {                   
                  //psw:adminqpbox2016
                    $message->to($data['correoUsuario'])->cc($data['copias'])->subject('Nueva Factura de Paquetes');
                    $message->attach($data['pathFile']);
                 });
              }
              else
              {
                if(File::exists(public_path() . $facturaEnBD ->img_PathFactura))
                   File::delete(public_path() . $facturaEnBD ->img_PathFactura );
                $facturaEnBD->img_PathFactura = $factura->img_PathFactura;
                $facturaEnBD->save();
                $miPaquete->updated_at = date('Y-m-d H:i:s');
                $miPaquete->save();

                Mail::queue('emails.enviofactura', $data, function($message) use ($data)
                {                   
                  //psw:adminqpbox2016
                    $message->to('facturas@quickpobox.com')->cc($data['copias'])->subject('cambio de Factura en Paquetes');
                    $message->attach($data['pathFile']);
                });
                Mail::queue('emails.enviofacturatouser', $data, function($message) use ($data)
                {                   
                  //psw:adminqpbox2016
                    $message->to($data['correoUsuario'])->cc($data['copias'])->subject('has cambiado de Factura de tu paquete');
                    $message->attach($data['pathFile']);
                });
              }



              return response()->json([
                          "success"=>"true", "mensaje"=>'Se ha enviado la factura correctamente, ser&aacute; revisada para posteriormente enviarle un correo con la cotizaci&oacute;n de la importaci&oacute;n.', "filename" =>  asset(''). '/images_bills/' .$name
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
        if (!Auth::user()->can('is-admin')) {
            Redirect::to('/')->send();
        }
        
        return view('admin.packages.create')->with('paquete',null);
        //return view('admin.addresses.create');
    }

    public function store(PaqueteRequest $request)
    {     
        //Este es el administrador   
        $user = Auth::user();        

        if (!$user->can('is-admin')) {
            Redirect::to('/')->send();
        }
        
        $paquete = new Paquete($request -> all());
        $asignarA = Usuario::where('id', $paquete->usuario_id)->first();                    
        $paquete->save();

        $data = array( 'name' => $asignarA->nombreUsuario, 'correoUsuario'=> $asignarA->email, 'folio' => $paquete->folio, 'proveedor' => $paquete->proveedor, 'alto' => $paquete->alto, 'ancho' => $paquete->ancho, 'largo' => $paquete->largo, 'peso' => $paquete->peso, 'ancho' => $paquete->ancho, 'tipopaquete' => $paquete->tipoPaquete, 'contenido' => $paquete->contenido, 'ubicacion' => 'En Laredo', 'observaciones' => $paquete->observaciones, 'suite' => $asignarA->id);

           Mail::queue('emails.paqueteasignado', $data, function($message) use ($data)
            {                   
              //psw:f4cturas_2020
              //$message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Cotizado!!'); 
              $message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Recibido!!');
            });


        Flash::overlay('El paquete '.$paquete->folio.' ha sido asignado a '.$asignarA->nombreUsuario,'Paquete asignado');
        
        return redirect()->route('packages.create');        
    }

    public function edit($id)
    {             
        //Este es el administrador   
        $user = Auth::user();        

        $paquete = Paquete::where('id', $id)->first();;

        //dd($paquete);        

         $data=array(
        'paquete'=>$paquete, 'isEdit'=> true
        );
                
        return view('admin.packages.create')->with($data);        
    }


    public function update(PaqueteRequest $request)
    {
        $input = $request->all();

        //dd($input);

        $paquete = Paquete::findOrFail($input["id"]);       

        if( $paquete->enviarPaquete =="enCotizacion" &&  $input["costoEnvio"] != $paquete->costoEnvio )
        {
          $paquete->fill($input);
          $paquete->enviarPaquete = "Cotizada";
          $paquete->save();
          $user =  $paquete->Usuario;


          $data = array( 'name' => $user->nombreUsuario, 'correoUsuario'=> $user->email, 'folio' => $paquete->folio, 'proveedor' => $paquete->proveedor, 'alto' => $paquete->alto, 'ancho' => $paquete->ancho, 'largo' => $paquete->largo, 'peso' => $paquete->peso, 'ancho' => $paquete->ancho, 'tipopaquete' => $paquete->tipoPaquete, 'contenido' => $paquete->contenido, 'ubicacion' => 'En Laredo', 'observaciones' => $paquete->observaciones, 'suite' => $user->id, 'idUsuario' => $user->id, 'costo' => $paquete->costoEnvio);

           Mail::queue('emails.paquetecotizado', $data, function($message) use ($data)
            {                   
              //psw:f4cturas_2020
              //$message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Cotizado!!'); 
              $message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Cotizado!!');
            });

        }
        elseif($paquete->estatus != $input["estatus"])
        {

          $paquete->fill($input);
          $paquete->enviarPaquete = "Cotizada";
          $paquete->save();
          $user =  $paquete->Usuario;

          $data = array( 'name' => $user->nombreUsuario, 'correoUsuario'=> $user->email, 'folio' => $paquete->folio, 'proveedor' => $paquete->proveedor, 'alto' => $paquete->alto, 'ancho' => $paquete->ancho, 'largo' => $paquete->largo, 'peso' => $paquete->peso, 'ancho' => $paquete->ancho, 'tipoPaquete' => $paquete->tipoPaquete, 'contenido' => $paquete->contenido, 'ubicacion' => 'En Laredo', 'observaciones' => $paquete->observaciones, 'suite' => $user->id, 'idUsuario' => $user->id, 'costo' => $paquete->costoEnvio);

           Mail::queue('emails.paqueteubicacion', $data, function($message) use ($data)
            {                   
              //psw:f4cturas_2020
              //$message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Cotizado!!'); 
              $message->to($data['correoUsuario'])->subject('Paquete cambio de ubicacion');
            });

        }
        else
        {
          $paquete->fill($input)->save();
        }

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
