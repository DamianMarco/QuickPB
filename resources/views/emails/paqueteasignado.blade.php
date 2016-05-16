
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <h3>Hemos recibido t&uacute; paquete, el cual tiene las siguientes caracteristicas:</h3>
      <table>
        <tr>
          <th colspan="2">
             Datos del Paquete... 
          </th>
        </tr>
        <tr>
          <th align="left" align="left">
             Folio: 
          </th>
          <td align="left">
              {{$folio}}
          </td>
        </tr>
        <tr>
          <th align="left">
            Proveedor: 
          </th>
          <td align="left">
              {{$proveedor}}
          </td>
        </tr>
        <tr>
          <th align="left">
             alto - ancho - largo: 
          </th>
          <td align="left">
              {{$alto}} - {{$ancho}} - {{$largo}}
          </td>
        </tr>
        <tr>
          <th align="left">
            Peso: 
          </th>
          <td align="left">
            {{$peso}}
          </td>
        </tr>
        <tr>
          <th align="left">
             Tipo paquete: 
          </th>
          <td align="left">
              {{$tipopaquete}}
          </td>
        </tr>
        <tr>
          <th align="left">
             Contenido: 
          </th>
          <td align="left">
              {{$contenido}}
          </td>
        </tr>
        <tr>
          <th align="left">
             Ubicaci&oacute;n: 
          </th>
          <td align="left">
              {{$ubicacion}}
          </td>
        </tr>
        <tr>
          <th align="left">
             Observaciones:
          </th>
          <td align="left">
              {{$observaciones}}
          </td>
        </tr>
      </table>
      </div>
      <!-- /content -->
      
    </td>
    <td align="left"></td>
  </tr>
</table>
@endsection