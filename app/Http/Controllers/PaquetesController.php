<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests;
use Auth;
use App\Paquete;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;



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

     public function storeimage(Request $request)
     {
      
        $user = Auth::user();
        $user->rol = "cliente";
        $user->save();
       /*
        $user = Auth::user();
        $file = $request->file('image');
        $name = $user->nombreUsuario . time() . $file->getClientOriginalExtension();
        $path = public_path() . '/images_bills/';
        $file->move($path, $name);
         if(Request::ajax()) {
              $data = Input::all();
              $bls= Input::get('firstname'),
              print_r($data);die;
              return ($data);
        }*/
        if(Request::ajax()) {
            $data = Request::all();
            //print_r($user);die;

            return response()->json([
                    "success"=>"true", "algomas"=>'nada'
                ], 200);
        }
        //return ($request->all());
        //return Response::json(["success"=>"true", "algomas"=>'nada']);
        return response()->json(["success"=>"true", "algomas"=>'nada']);
     }

    /*retornar los paquedes paginados 5 en 5
     public function getIndex ()
     {
       // $pacs = Paquete::orderBy('id','ASC')->paginate(5);

       // return view ('admin.paquetes.index') -> with('pacs',$pacs)
     }/*/
     
}
