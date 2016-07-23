
@extends('emails.header')

@section('content')
<br/>   
<div class="contenido">
  <h2>Paquete en movimiento</h2>   
  <p>
        <br />
        Apreciable {{$name}}, <br />
        <h3>QUICK PO BOX le notifica el estatus de su paquete</h3>
        <br />        
        Le informamos su paquete ha actualizado su ubicación:
        <br/>        
        <br />
        <b>DATOS DEL PAQUETE</b> <br />        
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
      <th align="left">Ubicaci&oacute;n: </th>
      <td align="left">{{$ubicacion}} </td>
    </tr>
  </table>
  <br /><br />
  <p>  
    <br />
    Para más información acerca de su paquete ingrese a <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a>
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