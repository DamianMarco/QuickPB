@extends('admin.templates.main')
@section('title', 'Paquetes')

@section('content')


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Mis Paquetes</h3></div>
  <div class="panel-body">
    <div class="alert" role="alert" >

  		<span><span style="color:red;"> ** </span>Costo calculado en un máximo  de 5 kilos de peso volumétrico.</span><br/>
  		<span>Articulos con un peso de mas de 5 Kilos o peso volumétrico llevan un cargo extra, pregunta por nuestros costos de sobrepeso.</span>
<br/><br/>
<div style=" width: 70%;">
	<table class="table table-condensed table-bordered">
	  		<tr class="active" ><th colspan="6"><strong>Estatus de los paquetes</strong></th> </tr>
	  			<tr><td >Recibido</td><td class="info">$ En Cotizaci&oacute;n</td>
	  			<td class="danger"> $ Cotizado</td><td class="warning"><i class="fa fa-send" aria-hidden="true"></i> Enviado</td>
	  			<th colspan="2" class="success"><strong>Entregado</strong></th> </tr>
				</table>
	</div>
	</div>
  <!-- Table -->
	<table class="table table-hover table-condensed"> 
		<thead> 
			<tr> 
				@if (Auth::user()->rol != "cliente")
					<th>Suite</th>  
				@endif
				<th>Socio</th> 
				<th>Ubicaci&oacute;n</th> 
				<th>Gu&iacute;a</th> 
				<th>Proveedor</th> 
				<th>Ver Detalle</th>
				<th>Contenido</th> 
				<th>Comentarios</th> 
				<th>Total a Pagar</th> 
				<th>Factura</th>  
				@if (Auth::user()->rol == "cliente")
				<th>Pagar</th>  
				@endif
				  
			</tr> 
		</thead> 
		<tbody> 
		@foreach( $packages as $pack )
			<tr id="{{ $pack->id. 'tr'}}"  
				@if ($pack->enviarPaquete == "enCotizacion")
					class="info"
				@elseif ($pack->enviarPaquete == "Cotizada")
					class="danger"
				@elseif ($pack->estatus == "enCurso" || $pack->estatus == "enTuCiudad" || $pack->estatus == "enEntrega")
					class="warning"
				@elseif ($pack->enviarPaquete == "Aceptada" || $pack->estatus == "entregado")
					class="success"
				@endif
			> 
			@if (Auth::user()->rol != "cliente")
				<th>{{$pack->Usuario->id}}</th>  
			@endif
			<th>{{$pack->Usuario->nombreUsuario}}</th> 
			<td>{{$pack->estatus}}</td> 
			<td>{{$pack->folio}}</td>
			<td>{{$pack->proveedor}}</td>
			<td>
			@if (Auth::user()->rol == "admin")
				<a class="btn btn-default" href="{{ route('packages.edit', $pack->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> Modificar</a>
			@else			
				<button type="button" class="btn btn-default" onclick="modalDetalle('{{$pack->folio}}','{{$pack->proveedor}}','{{$pack->contenido}}','{{$pack->costo}}','{{$pack->observaciones}}')"><i class="fa fa-eye" aria-hidden="true"></i> Ver Detalle</button>
			@endif
			</td>
			<td>{{$pack->contenido}}</td>
			<td>
			 @if(strlen ($pack->observaciones) > 20)
				{{substr($pack->observaciones,0,20) . "..."}}
			@else		
				{{$pack->observaciones}}
			@endif
			</td>
			<td>${{$pack->costo}} <span style="color:red;"> ** </span></td>
			<td>
			@if(!isset($pack->factura->img_PathFactura))
				<button type="button" class="btn btn-warning" id="{{ $pack->id. 'modalF'}}" onclick="modalFactura('{{$pack->id}}','{{ asset('/images_bills/docnobill.png')}}')" ><i class="fa fa-file-photo-o" aria-hidden="true"></i> Cotizar Importaci&oacute;n</button>
			@else
				<button type="button" class="btn btn-warning" id="{{ $pack->id . 'modalF'}}" onclick="modalFactura('{{$pack->id}}','{{ asset($pack->factura->img_PathFactura)}}')" ><i class="fa fa-file-photo-o" aria-hidden="true"></i> Factura enviada</button>
			@endif
			</td>
			@if (Auth::user()->rol == "cliente")
			<td>
				@if ($pack->enviarPaquete != "Cotizada")
					<button type="button" class="btn btn-danger" disabled="disabled"><i class="fa fa-credit-card" aria-hidden="true"></i> Pagar</button>
				@else
				{!! Form::open(['route'=> 'pays.realizapago',  'method' => 'POST']) !!}
					{!! Form::hidden('id', $pack->id) !!}
					<button type="submit" class="btn btn-danger"><i class="fa fa-credit-card" aria-hidden="true"></i> Pagar</button>
					 {!! Form::close() !!}
				@endif
			
			</td>
			@endif
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
 			<label for="recipient-name" class="control-label">Gu&iacute;a:</label> 
 			<input type="text" class="form-control" id="detalleFolio" readonly="readonly"> 
 		</div> 

 		 <div class="form-group"> 
 			<label for="recipient-name" class="control-label">Proveedor:</label> 
 			<input type="text" class="form-control" id="detalleProveedor" readonly="readonly"> 
 		</div>

 		 <div class="form-group"> 
 			<label for="recipient-name" class="control-label">Contenido:</label> 
 			<textarea class="form-control" id="detalleContenido" readonly="readonly"></textarea>  
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


<!-- MODAL FACTURA -->
<div class="modal fade" id="modalFactura" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">

@if (Auth::user()->rol == "cliente")
        ¿ Quieres recibir tu paquete en casa ? <br> Pida una cotización enviando una imagen/foto de su factura.
@else
	 Factura del cliente.
@endif
        </h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=> 'packages.storeimage', 'method' => 'PUT', 'id'=>'upload-doc','files'=>true ]) !!}
	 		<div class="form-group"> 
	 		{!! Form::hidden('paquete_id', '-1', array('id' => 'paquete_id')) !!}	
	 			

			<div id="lightgallery">
				<a href="{{ asset('/images_bills/docnobill.png') }}" id="afacturaimg">
		        	<img id="facturaimg" class="media-object fancybox" src="{{ asset('/images_bills/docnobill.png') }}" alt="Factura" height="100px" width="100px" >
		      </a>
			</div>	


      		@if (Auth::user()->rol == "cliente")
				<div class="form-group"> 
		 			<label for="recipient-name" class="control-label">Seleccionar imagen de la factura:</label> 
		 			{!! Form::file('fileupload', ['id'=>'fileupload', 'onchange'=>"this.parentNode.nextSibling.value = this.value" ], null) !!} 
		 		</div>

				<div class="well center-block" style="max-width:400px"> 
					<button type="submit"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-send" aria-hidden="true"></i> Enviar Factura</button> 
				</div>
			@endif
	 		</div> 

 		{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN MODAL FACTURA -->


@endsection

@section('misScripts')
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>

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

	function modalFactura(idPaquete, rutaImagen)
	{
		//img.setAttribute("src","images/LOGOHSI.JPG"); 
		//img.setAttribute("width","168"); 
		//img.setAttribute("height","66"); 
		//var contenedor=document.getElementById("imagen");
		jQuery("#facturaimg").attr("src", rutaImagen);
		jQuery("#afacturaimg").attr("href", rutaImagen)
		jQuery("#paquete_id").val(idPaquete);
		jQuery("#lightgallery").lightGallery();
		jQuery('#modalFactura').modal('show');
	}

    function mysuccess(info) {
    	if(info.success === 'true'){
           	Mensaje("Éxito", info.mensaje);
           	jQuery("#facturaimg").attr("src", info.filename);
			jQuery("#afacturaimg").attr("href", info.filename)
			valIdPac = jQuery("#paquete_id").val();
			jQuery("#" + valIdPac + "tr").addClass("info");
           	jQuery("#" + valIdPac + "modalF").attr("onclick", "modalFactura('" + valIdPac + "', '"+ info.filename +"')");
   		  }
       else
       		MessageWarning("Aviso", info.mensaje);
    }

    

    function myerror(info) {
        Error("Error", info.responseText);
    }

	jQuery(document).ready(function(){



		jQuery("#upload-doc").submit(function(e){
				 e.preventDefault();

				var formData = new FormData();
			   fileInputElement= jQuery('#fileupload');
			   hide= jQuery("input[name='_token']").val();
			   hpaquete_id= jQuery("input[name='paquete_id']").val();
			   formData.append("_token", hide); // number 123456 is immediately converted to a string "123456"
			   formData.append("paquete_id", hpaquete_id);
			   formData.append("userfile", fileInputElement[0].files[0]);

			//var formData = new FormData(jQuery('#upload-doc')[0]);
			//var see= formData;
	  		jQuery.ajax({
	                type: "POST",
	                url: virtualPath + "/packages/storeimage",
	                data: formData,
	                beforeSend: beforeSendAjax,
	                cache: false,
	                processData: false,
	                dataType: 'json',
	                contentType: false,
	                success: mysuccess,
	                error: myerror,
	                complete: function () {
	                    jQuery('#ajax').modal('hide');
	                }

	            },"json");
			});
		});

</script>

@endsection
