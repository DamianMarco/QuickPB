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
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{

    public function __construct()
    {

    }
 
    public function authenticate(Request $request)
    {

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
                    Auth::loginUsingId($theUser->id);
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

        $data = array( 'name' => $user->nombreUsuario, 'correo' => $user->email);

       // Mail::send('emails.bienvenido', $data, function($message) use ($data)
        //{
         //   $message->to($data['correo'], $data['correo'])->subject('Bienvenido a QuickPoBox!'); 
        //});
        
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
   
}
