@extends('admin.templates.main')
@section('title', 'Pagos')

@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
  <!-- panel facturacion -->
  <div class="panel panel-default">     
    <!-- Default panel contents -->
    <div class="panel-heading">Datos de Pago</div>
    <div class="panel-body">

     <div class="content">
      <div class="alert alert-info" role="alert">
          Realizaras el pago de tu paquete, es importante que revis&eacute; tanto los datos del paquete como los <strong>datos que capturar&aacute; de su tarjeta de cr&eacute;dito</strong>. 
      </div>
        <table class="table ">
          <tr>
            <th colspan="2">
              <h4><span class="label label-default">Datos del paquete a pagar</span></h4>
            </th>
          </tr>
          <tr>
            <th>
              Contenido: 
            </th>
            <td>
              <strong>{{$paquete->contenido}}</strong>
            </td>
          </tr>
          <tr>
            <th>
               tipo paquete: 
            </th>
            <td>
                <strong>{{$paquete->tipoPaquete}}</strong>
            </td>
          </tr>
          <tr>
            <th valign="middle">
               Costo del env&iacute;o: 
            </th>
            <th>
              <h5> $ {{number_format($paquete->costo, 2, '.', ',')}} </h5>
            </th>
          </tr>
        </table>
      </div>

      {!! Form::open(['route'=> 'pays.payment', 'id'=>'card-form', 'method' => 'POST', 'class' => 'login']) !!}
      <!-- /content -->
        {!! Form::hidden('id_paquete', $paquete->id) !!}
      <!--form action="" method="POST" id="card-form"-->
      <br>
        <h4><span class="card-errors label label-danger"></span></h4>
        <h4><span class="label label-default">Datos de la tarjeta de cr&eacute;dito</span></h4>
        <div class="form-row">
          <label>
            <span>Nombre del tarjetahabiente</span>
            <input type="text" class="form-control" name="name" size="20" data-conekta="card[name]"/>
          </label>
        </div>
        <div class="form-row">
          <label>
            <span>Número de tarjeta de crédito</span>
            <input type="text" class="form-control" size="20" name="number" data-conekta="card[number]" value="4242424242424242" />
          </label>
        </div>
        <div class="form-row">
          <label>
            <span>CVC</span>
            <input type="text" class="form-control" size="4" name="cvc" data-conekta="card[cvc]"/>
          </label>
        </div>        
          <div class="form-row">
            <label>
              <span>Fecha de expiración (MM/AAAA)</span>  
              <div class="form-inline">
                <input type="text" class="form-control" size="2" name="exp_month" data-conekta="card[exp_month]"/>          
                <span>/</span>
                <input type="text" class="form-control" size="4" name="exp_year" data-conekta="card[exp_year]"/>
              </div>
           </label>             
          </div>                    
        <div class="form-group">
             <div class="well center-block" style="max-width:400px"> 
                <button type="submit"  class="btn btn-danger btn-lg btn-block"><i class="fa fa-credit-card" aria-hidden="true"></i> Pagar</button> 
            </div>
        </div>
      <!--/form-->

      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
<!-- Scripts de conekta -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
@section('misScripts')
<script type="text/javascript" src="{{asset('vendor/bootbox/bootbox.min.js')}}"></script>
@endsection

<script type="text/javascript">
 
 // Conekta Public Key
  Conekta.setPublishableKey('key_O814sePy3koMWXxtU8CHsDQ');
 
 // Aqui se envia y valida el token.
$(function () {
    $("#card-form").submit(function(event) {  
      
        var $form = $(this);

          // Previene hacer submit más de una vez
          $form.find("button").prop("disabled", true);
          Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
         
          // Previene que la información de la forma sea enviada al servidor
          return false;
    });

});


var conektaSuccessResponseHandler = function(token) {
  var $form = $("#card-form");

  /* Inserta el token_id en la forma para que se envíe al servidor */
  $form.append($("<input type='hidden' name='conektaTokenId'>").val(token.id));
 
  /* and submit */
  $form.get(0).submit();
};


var conektaErrorResponseHandler = function(response) {
  var $form = $("#card-form");
  
  /* Muestra los errores en la forma */
  $form.find(".card-errors").text(response.message_to_purchaser);
  $form.find("button").prop("disabled", false);
};

</script>

@endsection