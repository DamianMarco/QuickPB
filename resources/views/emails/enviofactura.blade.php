
@extends('emails.header')

@section('content')
<br/>   
<div class="contenido">
  <h2>Cotizar importación</h2>   
  <p>
        <br />
        Solicitud de cliente, <br />
        <h3>QUICK PO BOX ha recibdo una factura para cotizar importación</h3>
        <br />        
        Hemos recibido una solicitud para realizar la cotización por la importación de un paquete:
        <br/>        
        <br />
        <b>DATOS DEL PAQUETE</b> <br />        
        <br />
  </p>
  <table>
    <tr>
      <th align="left">Usuario cliente: </th>
      <td align="left">{{$name}} </td>
    </tr>
    <tr>
      <th align="left">Suite: </th>
      <td align="left">{{$idUsuario}} </td>
    </tr>
    <tr>
      <th align="left">Correo: </th>
      <td align="left">{{$correoUsuario}} </td>
    </tr>
    <tr>
      <th align="left">Gu&iacute;a: </th>
      <td align="left">{{$folio}} </td>
    </tr>    
  </table>
  <br /><br />
  <p>  
    <br />
    Para realizar la cotización del paquete ingrese a <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a>, consulte los paquetes con solicitud de cotización, seleccione el paquete a cotizar y modifiquelo para enviar la cotización al cliente.
    <br/>            
  </p>
  <p>
                                                Somos,<br>
                                                QUICK PO BOX<br>
                                                <a href="www.quickpobox.com" target="_blank">www.quickpobox.com</a>
    <br />
  </p>
</div>
@endsection