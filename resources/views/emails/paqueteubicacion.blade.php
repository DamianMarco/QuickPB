
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <h3>t&uacute; paquete ha cambiado de ubicaci&oacute;n</h3>
      <table>
        <tr>
          <th colspan="2">
             Datos... 
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
             Ubicaci&oacute;n: 
          </th>
          <th>
              {{$ubicacion}}
          </th>
        </tr>
      </table>
      </div>
      <!-- /content -->
      
    </td>
    <td></td>
  </tr>
</table>
@endsection