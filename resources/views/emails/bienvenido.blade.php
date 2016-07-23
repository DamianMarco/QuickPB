@extends('emails.header')

@section('content')
	<br/>  	
	<div class="contenido">
	<h2>Registro exitoso</h2>		
	<p>
        <br />
        Saludos {{$name}}, <br />
        <h3>¡QUICK PO BOX te da la bienvenida!</h3>
        <br />        
        <br />
        <b>DATOS DE CUENTA</b> <br />
        <br />
        Usuario: <b>{{$name}}</b> <br />        
        Correo: <b>{{$email}}</b> <br />
        Contraseña: <b>{{$password}}</b> <br />
        Suite: <b>{{$suite}}</b> <br />
        <br />
        Tu nueva dirección en Estados Unidos es:<br/>
        <br/>        
        8682 San Gabriel <br/>        
        Suite {{$suite}} <br />
        Laredo, Texas, USA 78041 <br />
        <br />
        Le confirmamos que se ha registrado exitosamente. Hemos incluido una copia de nuestro contrato donde podrá leer nuevamente los términos y condiciones ha aceptado y que desde este momento en adelante regirán nuestra interacción.        
        <br />
        <p>
        I. Desde este momento usted puede realizar compras en Estados Unidos y enviarlo con nosotros a su suite.  
        <br />
        II. Una vez que su compra llegue con nosotros, recibirá una notificación y podrá consultarlo en línea.
        <br />
        III. Usted podrá recoger su compra en nuestras instalaciones o si usted lo desea solicitar su envió a México.
        </p>
        <p>
                                                    Atentamente,<br>
                                                    QUICK PO BOX<br>
                                                    <a href="www.quickpobox.com" target="_blank">www.quickpobox.com</a>
    	<br />
    </p>
	</div>
@endsection	
