<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Mail;

class ContactoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailTo(Request $request)
    {
        $correo = $request -> all();


        $name = $correo['name'];
        $email = $correo['email'];
        $message = $correo['message'];
        $human = intval($correo['human']);

        $errors = '';

        //dd($correo);

        if (!isset($name) || empty($name)) {
            $errors = 'Por favor introduzca su nombre. <br>';
        }

        if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = $errors.'Por favor introduzca un correo valido.<br>';
        }

        //Check if message has been entered
        if (!isset($message) || empty($message)) {
            $errors = $errors.'Por favor introduzca un mensaje o comentario.<br>';
        }

        if ($human !== 5) {
            $errors = $errors.'Su respuesta es incorrecta.';
        }

        //$from = 'Contacto QuickPOBox'; 
        //$to = $email; 
        //$subject = 'Mensaje desde QuickPOBox';
 
        //$body = "De:".$name."\n E-Mail:".$email."\n Mensaje:\n".$message;

        if ($errors == '') 
        {   
            $administradores = Usuario::where('rol','=', 'admin')->orWhere('estatus','=', 'activo')->get();         
            $data = array( 'name' => $name,  'email' => $email, 'mensaje' => $message, 'emailsAdmin' => $administradores->pluck('email')>toArray());
            //dd($data);        
            $enviado = Mail::send('emails.contacto', $data, function($m) use ($data)
            {   
                $m->from($data['email'],'Contacto: '.$data['name']);
                $m->to('contacto@quickpobox.com')->cc($data['emailsAdmin'])->subject('Contacto desde QuickPoBox!'); 
            });
            
            if ($enviado)
            {            
                Flash::overlay('El mensaje fue enviado correctamente','Mensaje enviado');
                //return view('contact');
            } 
            else 
            {
                Flash::error('El mensaje no fue enviado, favor de verificar datos.');
                //return view('contact');
            }             
        }
        else 
        {
            Flash::error('El mensaje contiene error(es):<br>'.$errors);
            //return view('contact');
        }
        return redirect('/contact');
    }
}