<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use Laracasts\Flash\Flash;
use App\Http\Requests\UsuarioRequest;
use Auth;
use Hash;
use Mail;

class UsuarioController extends Controller
{

    public function __construct()
    {
 
    }
 
    public function authenticate(Request $request)
    {
          //  dd($request -> remember);

        $user = new Usuario($request -> all());

        if (strpos($user->nombreUsuario, '@') !== false){

            $theUser = Usuario::where('email', $user->nombreUsuario)->first(); 
        }
        else{
            $theUser = Usuario::where('estatus', 'activo')
                        ->where('nombreUsuario', $user->nombreUsuario)->first();
        }
        if (!is_null($theUser))
        {
            if($theUser->estatus =='activo')
            {
                if (Hash::check($user->password, $theUser->password))
                    {

                        Auth::login($theUser, (!is_null($request ->remember)? true:false));
                        //Auth::attempt(['id' => $theUser->id,  'password' => $password], true);
                        //Auth::loginUsingId($theUser->id);       

                         //return redirect()->intended('/index');
                        return redirect('/index');
                    }
            }
            else
            {
                Flash::error('Su usuario no se encuentra activo.');
                return view('admin.users.create');
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
        $user->estatus = 'activo';

        $user -> save();
        
        $data = array( 'name' => $user->nombreUsuario,  'email' => $user->email);

        $enviado = Mail::send('emails.bienvenido', $data, function($m) use ($data)
        {                   
            //$m->from('altas@quickpobox.com','Nuevo usuario: '.$data['name']);
            $m->to($data['email'])->cc('damiancp@hotmail.com')->subject('Registro completo en Quick PO BOX'); 
            $m->attach('docs/Contrato_QuickPOBOX.pdf');
        });
            
        if ($enviado)
        {            
            Flash::overlay('¡ Bienvenido a Quick PO BOX ! ', 'Usuario creado exitosamente');            
        }
        else
        {

            Flash::error('Ocurrio un error al mandar correo de registro. ');            
        }

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
        Flash::overlay('! Datos actualizados correctamente ! ' , 'Actualizo sus datos.');
        return redirect()->route('users.create');
    }

    public function view()
    {           
        $user = Auth::user();
        return view('admin.users.view');
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

        $users = Usuario::where('id','like', '%'.$searchPhrase.'%')->orWhere('email','like', '%'.$searchPhrase.'%')->orWhere('nombreUsuario','like', '%'.$searchPhrase.'%')->take($take)->skip($skip)->get();

        if(count($sort)>0)
        {
            $sortBy = array_keys($sort);
            $direction = $sort[$sortBy[0]];
            
            if ($direction=="asc")
                $users = $users->sortBy($sortBy[0]);
            else
                $users = $users->sortByDesc($sortBy[0]);   
        }

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

    public function userList()
    {
        if (!Auth::user()->can('is-admin')) {
            Redirect::to('/')->send();
        }
             
       $users= Usuario::orderBy('updated_at','DESC')->get();

        $data=array(
        'users'=>$users
        );

        return view('admin.users.userlist')->with($data);;
    }

    public function changeActive(Request $request)
     {
       if($request->ajax()) {
          $data = $request->all();
          $id = $data["id_user"];
          $enableuser = $data["enable"];
          $user = Usuario::where("id", $id)->first();
          $user->estatus = $enableuser == "true" ? "activo":"inactivo";
          $user->save();
          return response()->json([
              "success"=>"true", "mensaje"=>'Cambios realizados correctamente.'
          ], 200);

          }        
    }

    public function changeTypeUser(Request $request)
     {
       if($request->ajax()) {
              $data = $request->all();
              $id = $data["id_user"];
              $enableuser = $data["type"];
              $user = Usuario::where("id", $id)->first();
              $user->rol = $enableuser  == "true"  ? "admin":"cliente";
              $user->save();
              return response()->json([
                  "success"=>"true", "mensaje"=>'Cambios realizados correctamente'
              ], 200);
          } 
    }
   
}
