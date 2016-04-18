<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    /*retornar los paquedes paginados 5 en 5
     public function getIndex ()
     {
       // $pacs = Paquete::orderBy('id','ASC')->paginate(5);

       // return view ('admin.paquetes.index') -> with('pacs',$pacs)
     }/*/
     
}
