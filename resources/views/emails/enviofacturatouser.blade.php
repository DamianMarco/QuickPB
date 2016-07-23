
@extends('emails.header')

@section('content')
<br/>   
<div class="contenido">
  <h2>Cotizar importaci&oacute;n</h2>   
  <p>
        <br />
        Estimado cliente, <br />
        <h3>QUICK PO BOX ha recibido su factura para cotizar importación</h3>
        <br />        
        Ha enviado la factura adjunta a este correo, lo que suceder&aacute; a continuaci&oacute;n, es que QUICK PO BOX con la informaci&oacute;n recibida realizar&aacute; la cotizaci&oacute;n respectiva, la cual recibir&aacute; en un breve periodo de tiempo en este mismo correo.
        <br/>        
        <br />
        <b>DATOS DEL PAQUETE</b> <br />        
        <br />
  </p>
  <table>
    <tr>
      <th align="left">Usuario: </th>
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
    Podr&aacute; consultar la cotizaci&oacute;n o detalles de su paquete ingrese a <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a>, en la secci&oacute;n <b>Mis paquetes</b>. La cotizaci&oacute;n es informativa, solo si usted esta de acuerdo con ella podr&aacute; solicitar el envio a M&eacute;xico, en caso contrario solo se necesitar&aacute; cubrir el costo de recepción del paquete, si ese es el caso, le recordamos que puede recogerlo directamente en nuestras instalaciones:
        <br/>        
        8682 San Gabriel <br/>        
        Suite {{$idUsuario}} <br />
        Laredo, Texas, USA 78041 <br />
        <br />            
  </p>
  <p>
                                                Atentamente,<br>
                                                QUICK PO BOX<br>
                                                <a href="www.quickpobox.com" target="_blank">www.quickpobox.com</a>
    <br />
  </p>
</div>
@endsection