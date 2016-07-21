
@extends('emails.header')

@section('content')
<br/>   
<div class="contenido">
  <h2>Paquete cotizado</h2>   
  <p>
        <br />
        Apreciable {{$name}}, <br />
        <h3>QUICK PO BOX ha cotizado la importación de su paquete</h3>
        <br />        
        Le informamos que de acuerdo a su solicitud hemos realizado la cotización por la importación de su paquete:
        <br/>        
        <br />
        <b>DATOS DEL PAQUETE COTIZADO</b> <br />        
        <br />
  </p>
  <table>
    <tr>
      <th align="left">Suite: </th>
      <td align="left">{{$idUsuario}} </td>
    </tr>
    <tr>
      <th align="left">Tipo paquete: </th>
      <td align="left">{{$tipopaquete}} </td>
    </tr>
    <tr>
      <th align="left">Contenido: </th>
      <td align="left">{{$contenido}} </td>
    </tr>
    <tr>
      <th align="left">Costo de importaci&oacute;n: </th>
      <td align="left">$ {{number_format($costo, 2, '.', ',')}} </td>
    </tr>
  </table>
  <br /><br />
  <p>  
    <br />
    Para más información ingrese a <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a>, donde si usted esta de acuerdo podrá realizar el pago en línea para el envío a México. En caso de que nuestra cotización no le sea satisfactoria puede rechazarla en línea y podrá recoger directamente su paquete en nuestras instalaciones:
    <br/>        
    8682 San Gabriel <br/>        
    Suite {{$suite}} <br />
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