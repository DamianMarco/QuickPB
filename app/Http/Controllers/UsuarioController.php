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
use Illuminate\Support\Facades\Validator;
use File;

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
        
        $administradores = Usuario::where('rol','=', 'admin')->where('estatus','=', 'activo')->get();
        $emailsAdmin = $administradores->pluck('email')->toArray();
        $form = $request->all();

        //dd($form);        

        $file = $form['img_Ife'];
         
         //dd($file);

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
             Flash::error('La copia de su identificaci&oacute;n debe cumplir con: <br> Formato (jpeg/gif/png/bmp/pdf) <br> Peso m&aacute;ximo de 50000kb');

             return redirect()->route('users.create');
             
          }

            

        $user = new Usuario($request -> all());
        $password = $user->password;
        $user->password = bcrypt($user->password);  
        $user->estatus = 'activo';   

        $name = $user->nombreUsuario . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images_ids/';
          //dd($path);
        $file-> move($path, $name);
        $user->img_Ife = '/images_ids/' . $name;     

        $user -> save();
        
        $data = array( 'name' => $user->nombreUsuario,  'email' => $user->email, 'password' => $password, 'suite' => $user->id, 'copias' => $emailsAdmin);



        $enviado = Mail::send('emails.bienvenido', $data, function($m) use ($data)
        {                   
            //$m->from('altas@quickpobox.com','Nuevo usuario: '.$data['name']);
            //dd($data['copias']);
            $m->to($data['email'])->cc($data['copias'])->subject('Registro completo en Quick PO BOX'); 
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
            if ($row->rol == "cliente") {
                $rows[] = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'nombreUsuario' => $row->nombreUsuario,
                    'estatus' => $row->estatus
                );
            }
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
