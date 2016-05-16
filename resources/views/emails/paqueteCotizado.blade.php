
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <h3>Se ha cotizado tu paquete</h3>
      <table>
        <tr>
          <th colspan="2">
             Datos del usuario... 
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
      </table>
      </div>
      <!-- /content -->
      
    </td>
    <td></td>
  </tr>
</table>
@endsection