
@extends('emails.header')

@section('content')
<br/>   
<div class="contenido">
  <h2>Pago recibido exitosamente</h2>   
  <p>
        <br />
        Apreciable {{$name}}, <br />
        <h3>QUICK PO BOX ha recibido su pago.</h3>
        <br />        
        Le informamos que su pago ha sido registrado exitosamente.
        <br/>        
        <br />
        <b>DATOS DEL PAGO</b> <br />        
        <br />
  </p>
  <table>
    <tr>
      <th align="left">Suite: </th>
      <td align="left">{{$idUsuario}} </td>
    </tr>
    <tr>
      <th align="left">Tipo paquete: </th>
      <td align="left">{{$tipoPaquete}} </td>
    </tr>
    <tr>
      <th align="left">Contenido: </th>
      <td align="left">{{$contenido}} </td>
    </tr>
    <tr>
      <th align="left">Pago recibido: </th>
      <th align="left">$ {{number_format($costo, 2, '.', ',')}} </th>
    </tr>
    <tr>
      <th align="left">C&oacute;digo de autorizaci&oacute;n  </th>
      <th align="left">{{$authcode}} </th>
    </tr>
    <tr>
      <th colspan="2" class="success">PAGO CUBIERTO </th>
    </tr>
  </table>
  <br /><br />
  <p>  
    <br />
    <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a> agradece su pago y esperamos en un futuro cercano seguir contando con su confianza.
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

