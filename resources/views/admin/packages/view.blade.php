@extends('admin.templates.main')
@section('title', 'Paquetes')

@section('content')


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Mis Paquetes</h3></div>
  <div class="panel-body">
    <div class="alert" role="alert">
  		<span><span style="color:red;"> ** </span>Costo calculado en un máximo  de 5 kilos de peso volumétrico.</span><br/>
  		<span>Articulos con un peso de mas de 5 Kilos o peso volumétrico llevan un cargo extra, pregunta por nuestros costos de sobrepeso.</span>
	</div>
  

  <!-- Table -->
	<table class="table table-hover table-bordered table-condensed"> 
		<thead> 
			<tr> 
				<th>Socio</th> 
				<th>Estatus</th> 
				<th>Folio</th> 
				<th>Proveedor</th> 
				<th>Ver Detalle</th>
				<th>Contenido</th> 
				<th>Comentarios</th> 
				<th>Total a Pagar</th> 
				<th>Factura</th>  
				<th>Pagar</th>  
				<th>Importar</th>  
			</tr> 
		</thead> 
		<tbody> 
		@foreach($packages as $pack )
			<tr> 
			<th>{{$pack->Usuario->nombreUsuario}}</th> 
			<td>{{$pack->estatus}}</td> 
			<td>{{$pack->folio}}</td>
			<td>{{$pack->proveedor}}</td>
			<td><button type="button" class="btn btn-default" onclick="modalDetalle('{{$pack->folio}}','{{$pack->proveedor}}','{{$pack->contenido}}','{{$pack->costo}}','{{$pack->observaciones}}')"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button></td>
			<td>{{$pack->contenido}}</td>
			<td>
			 @if(strlen ($pack->observaciones) > 10)
				{{substr($pack->observaciones,0,10) . "..."}}
			@else		
				{{$pack->observaciones}}
			@endif
			</td>
			<td>${{$pack->costo}} <span style="color:red;"> ** </span></td>
			<td><button type="button" class="btn btn-warning" onclick="showFactura()" ><i class="fa fa-file-photo-o" aria-hidden="true"></i> Factura</button></td>
			<td><button type="button" class="btn btn-danger"><i class="fa fa-credit-card" aria-hidden="true"></i> Pagar</button></td>
			<td><button type="button" class="btn btn-success"><i class="fa fa-send" aria-hidden="true"></i> Importar</button></td>
			</tr>
		@endforeach
		</tbody> 
	</table>
	</div>
	<div class="panel-footer">{!! $packages-> render()!!}</div>
</div>

<!-- MODAL DETALLE -->
<div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Detalle</h4>
      </div>
      <div class="modal-body">
       
 		<div class="form-group"> 
 			<label for="recipient-name" class="control-label">Folio:</label> 
 			<input type="text" class="form-control" id="detalleFolio" readonly="readonly"> 
 		</div> 

 		 <div class="form-group"> 
 			<label for="recipient-name" class="control-label">Proveedor:</label> 
 			<input type="text" class="form-control" id="detalleProveedor" readonly="readonly"> 
 		</div>

 		 <div class="form-group"> 
 			<label for="recipient-name" class="control-label">Contenido:</label> 
 			<input type="text" class="form-control" id="detalleContenido" readonly="readonly"> 
 		</div>

		<label for="recipient-name" class="control-label">Total a Pagar:</label> 
 		<div class="input-group">
		  <span class="input-group-addon">$</span>
		  <input type="text" class="form-control" id="detallePagar" aria-label="Amount (to the nearest dollar)" readonly="readonly">
		  <!--span class="input-group-addon">.00</span-->
		</div><br>

 		 <div class="form-group"> 
 			<label for="recipient-name" class="control-label">Comentarios:</label> 
 			<textarea class="form-control" id="detalleComentarios" readonly="readonly"></textarea> 
 		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN MODAL DETALLE -->


@endsection

@section('misScripts')



<script type="text/javascript">

function modalDetalle(Folio,Proveedor,Contenido,Pago,Comentario)
{
	jQuery("#detalleFolio").val(Folio);
	jQuery("#detalleProveedor").val(Proveedor);
	jQuery("#detalleContenido").val(Contenido);
	jQuery("#detallePagar").val(Pago);
	jQuery("#detalleComentarios").val(Comentario);

	jQuery('#modalDetalle').modal('show');
}

function modalFactura()
	{
		//jQuery('#modalFactura').modal('show');
	}

jQuery(document).ready(function(){
  
	
  /* 
  jQuery('#factura').click(function(){  
	jQuery('#modalFactura').modal('show');


           
    $.ajax({
      url: 'login',
      type: "post",
      data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
        alert(data);
      }
    }); 

  }); 
*/

});
</script>

@endsection
