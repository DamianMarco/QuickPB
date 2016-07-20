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
        Le confirmamos que se ha registrado exitosamente. Le hemos incluido una copia de nuestro contrato donde podrá conocer los términos y condiciones que desde este momento hemos convenido.
        <br />
        Su correo registrado es:
        <br />
        <br />
        <b>{{$email}}</b>
        <br />
        <br />
        <b>PASOS PARA INGRESAR</b>
    </p>
    <ol style="text-align: justify;">
        <li>Ingrese a <a href="http://www.quickpobox.com/" targer="_blank">www.quickpobox.com</a></li>
        <li>En la esquina superior derecha de click <b>Inicia sesi&oacute;n</b></li>
        <li>Introduzca su Correo Electrónico y Contraseña y de click en Inicia sesi&oacute;n.</li>
    </ol>
        <!--b>PASOS PARA COMPLETAR SU ALTA</b>
    </p>
    <ol style="text-align: justify;">
        <li>Envie a: <a style="color: #f4a733;" href="mailto:altas@quickpobox.com">altas@quickpobox.com</a> la siguiente documentación.</li>
        <li>Formato firmado y digitalizado del <a href="#">Contrato</a></li>
        <li>Copia ambos lados y digitalizada de su IFE.</li>
        <li><a href="#">Aviso de Privacidad</a> firmado y digitalizado.
        </li>
    </ol-->
    <br />
    <p>
        I. Desde este momento usted puede realizar compras en Estados Unidos y enviarlo con nosotros a su suite.  
        <br>
        II. Una vez que su compra llegue con nosotros, recibirá una notificación y podrá consultarlo en línea.
        <br>
        III. Usted podrá recoger su compra en nuestras instalaciones o si usted lo desea solicitar su envio a México.
    </p>
    <!--p>
    	Después de recibir su documentación y al validar las mismas, en un periodo máximo de 48 horas recibira una notificación de alta completada. 
    	<br>
    </p-->
	</div>
@endsection	
