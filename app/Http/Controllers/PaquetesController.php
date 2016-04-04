<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Paquete;

class PaquetesController extends Controller
{
    //
     public function view($id)
     {
     	//$pacs = DB::table('paquetes')->where('usuario_id', $id)->get(); //App\Paquetes::where('usuario_id', $id)->get();
		$pacs = Paquete::where('usuario_id', $id)->get();
		$pacs->each(function($pacs){
			$pacs -> usuario;
		});
		
     	dd($pacs);
     }

    //retornar los paquedes paginados 5 en 5
     public function index ()
     {
        $pacs = Paquete::orderBy('id','ASC')->paginate(5);

        return view ('admin.paquetes.index') -> with('pacs',$pacs)
     }
}
