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
}
