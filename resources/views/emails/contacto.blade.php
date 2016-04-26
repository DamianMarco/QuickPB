
@extends('emails.header')

@section('content')
<table class="body-wrap" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF">

      <!-- content -->
      <div class="content">
      <table>
        <tr>
          <td>
          	<h1>CONTACTO QUICKPOBOX</h1>
            <p>El señor(a) {{$name}},</p>
            
            <p>Ha enviado el siguiente mensaje/comentario desde <a href="www.quickpobox.com" targer="_blank">QUICKPOBOX</a> </p>
            <h4>MENSAJE/COMENTARIO</h4>
            <p>{{$mensaje}}</p>
            <p></p>
            <p>Correo de contacto: {{$email}}.</p>
            <p><!--a href="http://twitter.com/leemunroe">Follow @leemunroe on Twitter</a--></p>
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

