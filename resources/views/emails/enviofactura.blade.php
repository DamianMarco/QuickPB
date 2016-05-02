
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <h1>Envio de facturas</h1>
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
      </table>
      </div>
      <!-- /content -->
      
    </td>
    <td></td>
  </tr>
</table>
@endsection