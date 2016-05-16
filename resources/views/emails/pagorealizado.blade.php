
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <h1>Has pagado con exit&oacute; tu paquete</h1>
      <table>
        <tr>
          <th colspan="2">
             Datos del tu Usuario y Paquete... 
          </th>
        </tr>
        <tr>
          <th>
             Usuario: 
          </th>
          <td>
              {{$name}}
          </td>
        </tr>
        <tr>
          <th>
             Suite: 
          </th>
          <td>
              {{$idUsuario}}
          </td>
        </tr>
        <tr>
          <th>
             tipo paquete: 
          </th>
          <td>
              {{$tipoPaquete}}
          </td>
        </tr>
        <tr>
          <th>
            Contenido: 
          </th>
          <td>
            {{$contenido}}
          </td>
        </tr>
        <tr>
          <th>
             Costo del env&iacute;o: 
          </th>
          <th>
             $ {{number_format($costo, 2, '.', ',')}}
          </th>
        </tr>
        <tr>
          <th>
             C&oacute;digo de autorizaci&oacute;n  
          </th>
          <th>
           {{$authcode}}
          </th>
        </tr>
         <tr>
          <th colspan="2" class="success">
             Pago cubierto! 
          </th>
        </tr>
      </table>
      </div>
      <!-- /content -->
      <strong>Ahora te enviaremos mas informaci&oacute;n en pr&oacute;ximos correos para que te enteres cuando recibiras t&uacute; paquete</strong>>
    </td>
    <td></td>
  </tr>
</table>
@endsection

