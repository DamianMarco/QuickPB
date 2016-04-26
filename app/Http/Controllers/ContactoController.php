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

        if (!isset($name)) {
            $errors = 'Por favor introduzca su nombre. \n';
        }

        if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = $errors.'Por favor introduzca un correo valido.';
        }

        //Check if message has been entered
        if (!isset($message)) {
            $errors = $errors.'Por favor introduzca un mensaje o comentario.';
        }

        if ($human !== 5) {
            $errors = $errors.'Su respuesta es incorrecta.';
        }

        $from = 'Contacto QuickPOBox'; 
        $to = $email; 
        $subject = 'Mensaje desde QuickPOBox';
 
        $body = "De:".$name."\n E-Mail:".$email."\n Mensaje:\n".$message;

        if ($errors == '') 
        {
            //mail ($to, $subject, $body, $from)
            if ($errors == '') 
            {
                Flash::overlay('El mensaje fue enviado correctamente','Mensaje enviado');
                return view('contact');
            } 
            else 
            {
                Flash::error('El mensaje no fue enviado, favor de verificar datos.');
                return view('contact');
            }
        }
        else 
        {
            Flash::error('El mensaje contiene error(es):'.$errors);
            return view('contact');
        }
    }
}