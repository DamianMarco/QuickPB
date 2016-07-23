<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Usuario;
use App\Direccion;
use App\Paquete;
use App\Pago;
use Conekta;
use Conekta_Charge;

class PagosController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function view()
     {        
        //$user = Auth::user();
       
        return view('admin.pays.pagos');
     }

     public function madepayment(Request $request)
     {        
        //$user = Auth::user();
         $data = $request->all();
           
         if(isset($data["id"]))
          $idPaquete = $data["id"];
         else
          $idPaquete= 0;
        $elPaquete = Paquete::where('id', $idPaquete)->first();

        return view('admin.pays.pagos')->with('paquete',$elPaquete);
     }

    public function payment(Request $request) 
    {
    	//dd($request->all());
    	
        $cargo = $request->all();
       
        $user = Auth::user();      
        $billing_address = Direccion::where('usuario_id', $user->id)->where('tipo','facturacion')->first();
        $miPaquete = Paquete::where('id', $cargo["id_paquete"])->where('usuario_id', $user->id)->first();
       
        if(is_null($billing_address))
        {

          Flash::overlay("Es necesario la dirección de facturacion", 'Error',2);
            return view('admin.pays.pagos');
        }

        if(is_null($miPaquete))
        {

          Flash::overlay("No se encontro informacion del paquete a pagar", 'Error',2);
            return view('admin.pays.pagos');
        }        

        $costopack = ($pack->costoEnvio != 0) ?  $costopack = $pack->costoEnvio : $pack->costo;
        $costopack = number_format($costopack, 2, '.', ',');
        Conekta::setApiKey("key_docRukcYyavvENHa2yPmDA");        

        try 
        {
            $charge = Conekta_Charge::create(array(
                  'description'=> $miPaquete->contenido,
                  'reference_id'=> $miPaquete->id,
                  'amount'=> $costopack,
                  'currency'=>'MXN',
                  'card'=> 'tok_test_visa_4242', // $_POST['conektaTokenId']
                  'details'=> array(
                    'name'=> $billing_address->nombre." ".$billing_address->apellidoPaterno." ".$billing_address->apellidoMaterno, //'Arnulfo Quimare',
                    'phone'=> $billing_address ->telefono, //'403-342-0642',
                    'email'=> $user->email, //'logan@x-men.org',
                    'customer'=> array(
                      'logged_in'=> true,
                      'successful_purchases'=> 14,
                      'created_at'=> 1379784950,
                      'updated_at'=> 1379784950,
                      'offline_payments'=> 4,
                      'score'=> 9
                    ),
                    'line_items'=> array(
                      array(
                        'name'=> 'COBRO DE PAQUETE',
                        'description'=>  $miPaquete->contenido,
                        'unit_price'=>  $costopack,
                        'quantity'=> 1,
                        'sku'=> 'cohb_s1',
                        'category'=>  $miPaquete->tipopaquete //'package'
                      )
                    ),
                    'billing_address'=> array(
                      'street1'=>$billing_address->calle,
                      'street2'=> $billing_address->numero,
                      'street3'=> $billing_address->numerointerior,
                      'city'=> $billing_address->ciudadMunicipio,
                      'state'=>$billing_address->estado,
                      'zip'=> $billing_address->codigoPostal,
                      'country'=> $billing_address->pais,
                      'tax_id'=> null, //'xmn671212drx',
                      'company_name'=> $cargo["name"], // 'X-Men Inc.',
                      'phone'=> $billing_address->telefono,//'77-777-7777',
                      'email'=> $user->email//'purshasing@x-men.org'
                    )
                  )
                ));
           
            //echo $charge->status;
        } 
        catch (Conekta_Error $e) 
        {
           dd($e);

        	  Flash::overlay($e->getMessage(), 'Error',2);
         	  return view('admin.pays.pagos');
        	 
          // return View::make('pagos',array('message'=>$e->getMessage()));
        } 

        $metodoPago = $charge->payment_method;

          $miPaquete->enviarPaquete ="Aceptada";
          $miPaquete->save();
        
         $data = array( 'name' => $user->nombreUsuario, 'correoUsuario'=> $user->email, 'idUsuario' => $user->id, 'tipoPaquete' => $miPaquete->tipoPaquete, 'contenido' => $miPaquete->contenido, 'costo' => $miPaquete->costo, 'authcode' => $metodoPago->auth_code);

         Mail::queue('emails.paquetecotizado', $data, function($message) use ($data)
          {                   
            //psw:f4cturas_2020
            $message->to($data['correoUsuario'])->cc('facturas@quickpobox.com')->subject('Paquete Pagado!!');
          });

        $metodoPago = $charge->payment_method;

        //dd($charge);
// Se almacena la informacion del pago
        $nuevoPago = new Pago();
        $nuevoPago ->usuario_id=$user->id;
        $nuevoPago ->paquete_id=$miPaquete->id;

        $nuevoPago ->referencia=$charge->reference_id;
        $nuevoPago ->descripcion=$charge->description;
        $nuevoPago ->titular=$cargo["name"];
        $nuevoPago ->codigoAutorizacion=$metodoPago->auth_code;
        $nuevoPago ->numeroTarjeta=$metodoPago->last4;
        $nuevoPago ->monto=floatval($charge->amount);
        $nuevoPago ->estatus=$charge->status;


        $nuevoPago -> save();  

        if($charge->status="paid")
          Flash::overlay("El pago fue procesado con exito. Por favor verifique con su banco.");
        return view('admin.pays.pagos');
        //return View::make('pagos',array('message'=>$charge->status));
        
    }
}
