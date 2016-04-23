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
			<td><button type="button" class="btn btn-warning" onclick="modalFactura('{{$pack->id}}')" ><i class="fa fa-file-photo-o" aria-hidden="true"></i> Factura</button></td>
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
        <h4 class="modal-title" id="gridSystemModalLabel">Imagen de su factura</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=> 'packages.storeimage', 'method' => 'POST', 'id'=>'upload-doc','files'=>true ]) !!}
	 		<div class="form-group"> 
	 			<ul class="media-list">
				  <li class="media">
				    <div class="media-left">
				      
				        <img class="media-object" class="fancybox" src="images/reception.png" alt="Factura">
				      
				    </div>
				    <div class="media-body">
				      <h4 class="media-heading">Media heading</h4>
				      ...
				    </div>
				  </li>
				</ul>

				<div class="form-group"> 
		 			<label for="recipient-name" class="control-label">Seleccionar imagen de la factura:</label> 
		 			{!! Form::file('fileupload', ['id'=>'fileupload', 'onchange'=>"this.parentNode.nextSibling.value = this.value" ], null) !!} 
		 		</div>

				<div class="well center-block" style="max-width:400px"> 
					<button type="submit"  class="btn btn-primary btn-lg btn-block">Guardar</button> 
				</div>
				
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
    jQuery(function($){
        var addToAll = false;
        var gallery = false;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    jQuery.noConflict();
</script>



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

	function modalFactura(idPaquete)
	{
		//img.setAttribute("src","images/LOGOHSI.JPG"); 
		//img.setAttribute("width","168"); 
		//img.setAttribute("height","66"); 
		//var contenedor=document.getElementById("imagen");
		jQuery('#modalFactura').modal('show');
	}



	function saveImage()
	{

		
		/*var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		FormData support starts from following desktop browsers versions. IE 10+, Firefox 4.0+, Chrome 7+, Safari 5+, Opera 12+
		$.ajax({
		    url: '/packages/saveimage/',
		    type: 'POST',
		    data: {_token: CSRF_TOKEN},
		    dataType: 'JSON',
		    success: function (data) {
		        console.log(data);
		    }
		});*/
		//<!--input type="hidden" name="_token" value="{{ csrf_token()}}"-->
		//jQuery("#upload-doc").submit();

		var formData = new FormData(jQuery('#upload-doc')[0]);
		var see= formData;
  		jQuery.ajax({
                type: "POST",
                url: virtualPath + "/packages/storeimage/",
                data: formData,
                beforeSend: beforeSendAjax,
                success: mysuccess,
                error: myerror,
                cache:  false,
                processData: false,
                dataType: 'json',
                contentType: false,
                complete: function () {
                    jQuery('#ajax').modal('hide');
                }

            });


	}


    function mysuccess(info) {
           Mensaje("Éxito", info);
    }

    function myerror(info) {
        Error("Error", info.responseText);
    }

	jQuery(document).ready(function(){

		jQuery("#saveImage").click(function(evt) {
		    evt.preventDefault();
		   
		    //jQuery("#upload-doc").submit();
			var formData = new FormData();
			   fileInputElement= jQuery('#fileupload');
			   hide= jQuery("input[name='_token']").val();
			   formData.append("_token", hide); // number 123456 is immediately converted to a string "123456"
			   formData.append("userfile", fileInputElement[0].files[0]);


			//var formData = new FormData(jQuery('#upload-doc')[0]);
			//var see= formData;
	  		jQuery.ajax({
	                type: "POST",
	                url: virtualPath + "/packages/storeimage/",
	                data: formData,
	                beforeSend: beforeSendAjax,
	                success: mysuccess,
	                error: myerror,
	                cache:  false,
	                processData: false,
	                dataType: 'json',
	                contentType: false,
	                complete: function () {
	                    jQuery('#ajax').modal('hide');
	                }

	            },"json");


		});

			jQuery("#upload-doc").submit(function(e){
					 e.preventDefault();

			var formData = new FormData();
			   fileInputElement= jQuery('#fileupload');
			   hide= jQuery("input[name='_token']").val();
			   formData.append("_token", hide); // number 123456 is immediately converted to a string "123456"
			   //formData.append("userfile", fileInputElement[0].files[0]);
			   formData.append('testdata' , 'testdatacontent');

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

/*
	jQuery(document).ready(function(){
	  
		jQuery("#upload-doc").submit(function(evt){	 
			   evt.preventDefault();

			   //var formData = new FormData(jQuery(this)[0]); 
			   var formData = new FormData();
			   fileInputElement= jQuery('#fileupload');
			   hide= jQuery("input[name='_token']").val();
			   formData.append("_token", hide); // number 123456 is immediately converted to a string "123456"
			   formData.append("userfile", fileInputElement[0].files[0]);

				//var formData = new FormData(jQuery('#upload-doc')[0]);
				var see= formData;
		  		jQuery.ajax({
                type: "POST",
                url: virtualPath + "/packages/saveimage/",
                data: formData,
                beforeSend: beforeSendAjax,
                success: mysuccess,
                error: myerror,
                cache:  false,
                processData: false,
                dataType: 'json',
                contentType: false,
                complete: function () {
                    jQuery('#ajax').modal('hide');
                }

            });


		  		jQuery('INPUT[type="file"]').change(function () {
				    var ext = this.value.match(/\.(.+)$/)[1];
				    switch (ext) {
				        case 'jpg':
				        case 'jpeg':
				        case 'png':
				        case 'gif':
			            jQuery('#fileupload').attr('disabled', false);
				            break;
				        default:
				            alert('This is not an allowed file type.');
				            this.value = '';
				    }
				});

         });

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
	

	});
*/

</script>

@endsection
