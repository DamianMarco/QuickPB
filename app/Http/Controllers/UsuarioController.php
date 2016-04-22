<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use Laracasts\Flash\Flash;
use App\Http\Requests\UsuarioRequest;
use Auth;
use Hash;


class UsuarioController extends Controller
{

    public function __construct()
    {
        //Protege el controller
        //$this->middleware('auth');
        //expone rutas sin proteccion
       // $this->middleware('auth', ['except' => ['create','store']]);
        //$this->middleware('auth', ['except' => ['salir', 'getLogout']]);
       
 
    }
 
    public function authenticate(Request $request)
    {
          //  dd($request -> remember);

        $user = new Usuario($request -> all());

        if (strpos($user->nombreUsuario, '@') !== false){

            $theUser = Usuario::where('estatus', 'activo')
                        ->where('email', $user->nombreUsuario)->first(); 
        }
        else{
            $theUser = Usuario::where('estatus', 'activo')
                        ->where('nombreUsuario', $user->nombreUsuario)->first();
        }
        if (!is_null($theUser))
        {
            if (Hash::check($user->password, $theUser->password))
                {

                    Auth::login($theUser, (!is_null($request ->remember)? true:false));
                    //Auth::attempt(['id' => $theUser->id,  'password' => $password], true);
                    //Auth::loginUsingId($theUser->id);
                     return redirect()->intended('/index');
                }
        }

        Flash::error('Usuario o contrasena incorrectos, favor de verificar');
        return view('admin.users.create');



    }

    public function create()
    {
    	//dd('Hola esto es un message box');
        return view('admin.users.create');
    }

    public function salir()
    {
        //dd('listpo');
        //Auth::logout(Auth::user());
        //$this->auth->logout();
        //Session::flush();
         Auth::logout();
        auth()->logout();
    //$this->auth->logout();
      //  Session::flush();
        return view('welcome');
    }

    public function store(UsuarioRequest $request)
    {
        $user = new Usuario($request -> all());
        $user->password = bcrypt($user->password);  
        //dd($request -> all());
        $user -> save();
        Flash::overlay('Usuario creado correctamente, revise su correo para confirmar el alta! ' . $user->nombreUsuario, 'Usuario creado');

        return redirect()->route('users.create');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $user = Usuario::find($id);
        $user = fill($request->all());
            
        $user -> save();
        Flash::overlay('!Datos actualizado correctamente! ' , 'Actualizo sus datos.');
        return redirect()->route('users.create');
    }

    public function view()
    {           

        $user = Auth::user();

        //$usuarios = Usuario::all();        
        
        /*$jsonData='{';        
        $jsonData=$jsonData.'"current" : 1,';
        $jsonData=$jsonData.'"rowCount" : 10,';
        $jsonData=$jsonData.'"rows" : '.$usuarios->toJson().',';
        $jsonData=$jsonData.'"total" :'.$usuarios->count().'}';*/
        
        //dd($jsonData);

        //dd($usuarios->toJson());

        return view('admin.users.view');
    }

    public function apiList(Request $request)
    {
        $params = $request->all();        

        $rowCount = (isset($params['rowCount']))?$params['rowCount']:10;
        $current = (isset($params['current']))?$params['current']:1;
        $searchPhrase = (isset($params['searchPhrase'])) ? $params['searchPhrase'] : '';

        $take = ($rowCount <> 10) ? $rowCount : 10;
        $skip = ($current > 1) ? $current-1 : 0;

        //dd($rowCount);
        //->orWhere('name', 'John')
        $users = Usuario::where('id','like', '%'.$searchPhrase.'%')->orWhere('email','like', '%'.$searchPhrase.'%')->orWhere('nombreUsuario','like', '%'.$searchPhrase.'%')->take($take)->skip($skip)->get();
        //$users = Usuario::all();

        $rows = [];
        foreach($users as $row) {
     
            $rows[] = array(
                'id' => $row->id,
                'email' => $row->email,
                'nombreUsuario' => $row->nombreUsuario,
                'estatus' => $row->estatus
            );
        }
     
        $data = array(
            'current' => $skip,
            'rowCount' => $take,
            'rows' => $rows,
            'total' => count($users),
        );
     
        return json_encode($data);
    }
   
}
