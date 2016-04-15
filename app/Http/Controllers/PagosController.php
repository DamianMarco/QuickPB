<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Conekta;
use Conekta_Charge;

class PagosController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function view()
     {        
        //$user = Auth::user();
        
      
        return view('admin.pays.pagos');
     }

    public function payment(Request $request) 
    {
    	//dd($request->all());
    	
        //Clave privada
        Conekta::setApiKey("key_docRukcYyavvENHa2yPmDA");        

        try 
        {
            $charge = Conekta_Charge::create(array(
                  'description'=> 'Stogies',
                  'reference_id'=> '9839-wolf_pack',
                  'amount'=> 20000,
                  'currency'=>'MXN',
                  'card'=> 'tok_test_visa_4242', // $_POST['conektaTokenId']
                  'details'=> array(
                    'name'=> 'Arnulfo Quimare',
                    'phone'=> '403-342-0642',
                    'email'=> 'logan@x-men.org',
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
                        'name'=> 'Box of Cohiba S1s',
                        'description'=> 'Imported From Mex.',
                        'unit_price'=> 20000,
                        'quantity'=> 1,
                        'sku'=> 'cohb_s1',
                        'category'=> 'food'
                      )
                    ),
                    'billing_address'=> array(
                      'street1'=>'77 Mystery Lane',
                      'street2'=> 'Suite 124',
                      'street3'=> null,
                      'city'=> 'Darlington',
                      'state'=>'NJ',
                      'zip'=> '10192',
                      'country'=> 'Mexico',
                      'tax_id'=> 'xmn671212drx',
                      'company_name'=>'X-Men Inc.',
                      'phone'=> '77-777-7777',
                      'email'=> 'purshasing@x-men.org'
                    )
                  )
                ));

            //echo $charge->status;
        } 
        catch (Conekta_Error $e) 
        {
        	  Flash::overlay($e->getMessage(), 'Error',2);
         	  return view('admin.pays.pagos');
        	 
          // return View::make('pagos',array('message'=>$e->getMessage()));
        }        
        Flash::error($charge->status);
        return view('admin.pays.pagos');
        //return View::make('pagos',array('message'=>$charge->status));
        
    }
}
