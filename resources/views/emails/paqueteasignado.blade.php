
@extends('emails.header')

@section('content')
<br/>   
  <div class="contenido">
  <h2>Paquete recibido</h2>   
  <p>
        <br />
        Apreciable {{$name}}, <br />
        <h3>QUICK PO BOX ha recibido su paquete</h3>
        <br />        
        <br />
        <p>  
        <br />
        Le informamos que hemos recibido un paquete para usted en nuestras instalaciones:
        <br/>        
        <br />
        <b>DATOS DEL PAQUETE</b> <br />        
        <br />
        </p>
        <table>
        <tr>
          <th align="left">Guía: </th>
          <td align="left">{{$folio}} </td>
        </tr>
        <tr>
          <th align="left">Paquetería: </th>
          <td align="left">{{$proveedor}} </td>
        </tr>
        <tr>
          <th align="left">Dimensiones: </th>
          <td align="left">{{$alto}} Alto - {{$ancho}} Ancho- {{$largo}} Largo</td>
        </tr>
        <tr>
          <th align="left">Peso: </th>
          <td align="left">{{$peso}} </td>
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
          <th align="left">Ubicaci&oacute;n: </th>
          <td align="left">{{$ubicacion}} </td>
        </tr>
        <tr>
          <th align="left">Observaciones: </th>
          <td align="left"> {{$observaciones}} </td>
        </tr>
      </table>
      <br /><br />
      <p>  
        <br />
        Para más información ingrese a <a href="www.quickpobox.com" target="_blank">QUICK PO BOX</a>, donde además podrá solicitar una cotización y si lo desea solicitar su envío a México.
        <br/>
        Así mismo le recordamos que puede recogerlo directamente en nuestras instalaciones:
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