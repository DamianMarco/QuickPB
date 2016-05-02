@extends('emails.header')

@section('content')
		<br/>  
	
	<div class="contenido">
		<h2>Alta de Usuario</h2>		
		<p>
        <br>
        Bienvenido {{$name}},        
        <br />
        <br />
        Le confirmamos que su usuario ha sido dado de alta para ingresar a <a href="http://www.quickpobox.com/" targer="_blank">www.quickpobox.com</a>.<br>
        Su correo registrado es:
        <br />
        <br />
        <b>{{$email}}</b>
        <br />
        <br />
        <b>PASOS PARA COMPLETAR SU ALTA</b>
    </p>
    <ol style="text-align: justify;">
        <li>Envie a: <a style="color: #f4a733;" href="mailto:altas@quickpobox.com">altas@quickpobox.com</a> la siguiente documentación.</li>
        <li>Formato firmado y digitalizado del <a href="#">Contrato</a></li>
        <li>Copia ambos lados y digitalizada de su IFE.</li>
        <li><a href="#">Aviso de Privacidad</a> firmado y digitalizado.
        </li>
    </ol>
    <br />
    <p>
    	Después de recibir su documentación y al validar las mismas, en un periodo máximo de 48 horas recibira una notificación de alta completada. 
    	<br>
    </p>
	</div>
@endsection	
