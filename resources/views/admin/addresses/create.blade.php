@extends('admin.templates.main')
@section('title', 'Direccion')

@section('content')

<div class="row">
	@if(count($errors) > 0)
	<div class="row">
		<div class=".col-md-6 .col-md-offset-3 alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif
	<div class="col-md-6 col-md-offset-3">
		<!-- Nav tabs -->		
		<ul class="nav nav-tabs" role="tablist">
	    	<li role="presentation" class="active"><a href="#facturacion" aria-controls="facturacion" role="tab" data-toggle="tab"><i class="fa fa-file-text" aria-hidden="true"></i> Facturaci&oacute;n</a></li>
	    	<li role="presentation"><a href="#envio" aria-controls="envio" role="tab" data-toggle="tab"><i class="fa fa-home" aria-hidden="true"></i> Env&iacute;o</a></li>    
	  	</ul>
	  	<!-- Tab panes -->
	  	<div class="tab-content">
    		<div role="tabpanel" class="tab-pane active" id="facturacion">
    			<!-- panel facturacion -->
    			<div class="panel panel-default">  		
  				<!-- Default panel contents -->
		  			<div class="panel-heading">Direcci&oacute;n de facturaci&oacute;n</div>
		  			<div class="panel-body">
		  				{!! Form::open(['route'=> 'addresses.store', 'id'=>'billing-form', 'method' => 'POST']) !!}
		    			@if($facturacion->count() > 0)
		    			<div class="form-group">
						    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">						    
							  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $facturacion[0]["nombre"] }}">						      
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" value="{{ $facturacion[0]["apellidoPaterno"] }}" >
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoMaterno" class="col-sm-2 control-label">Apellido Materno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" value="{{ $facturacion[0]["apellidoMaterno"] }}">
						    </div>
					  	</div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">						    
						      <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="{{ $facturacion[0]["calle"] }}">		        
						      </div>
						  </div>
						  <div class="form-group">
						    <label for="numero" class="col-sm-2 control-label">N&uacute;mero</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" value="{{ $facturacion[0]["numero"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="numerointerior" class="col-sm-2 control-label">N&uacute;mero Interior</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numerointerior" name="numerointerior" placeholder="N&uacute;mero Interior" value="{{ $facturacion[0]["numerointerior"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="entreCalles" class="col-sm-2 control-label">Entre Calles</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="entreCalles" name="entreCalles" placeholder="Entre Calles" value="{{ $facturacion[0]["entreCalles"] }}">
						    </div>
						  </div>				  
						  <div class="form-group">
						    <label for="ciudadMunicipio" class="col-sm-2 control-label">Ciudad</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="ciudadMunicipio" name="ciudadMunicipio" placeholder="Ciudad"  value="{{ $facturacion[0]["ciudadMunicipio"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="estado" class="col-sm-2 control-label">Estado</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ $facturacion[0]["estado"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="pais" class="col-sm-2 control-label">Pa&iacute;s</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s" value="{{ $facturacion[0]["pais"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="codigoPostal" class="col-sm-2 control-label">C&oacute;digo Postal</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="C&oacute;digo Postal" value="{{ $facturacion[0]["codigoPostal"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="telefono" class="col-sm-2 control-label">T&eacute;lefono</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="T&eacute;lefono" value="{{ $facturacion[0]["telefono"] }}">
						    </div>
						  </div>
						  <input type="hidden" class="form-control" id="tipo" name="tipo" value="facturacion">
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i> Guardar</button>
						    </div>
						  </div>					
						  @else
						  <div class="form-group">
						    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">						    
							  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">	      
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno">
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoMaterno" class="col-sm-2 control-label">Apellido Materno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno">
						    </div>
					  	</div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">						    
						      <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">		        </div>
						  </div>
						  <div class="form-group">
						    <label for="numero" class="col-sm-2 control-label">N&uacute;mero</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="numerointerior" class="col-sm-2 control-label">N&uacute;mero Interior</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numerointerior" name="numerointerior" placeholder="N&uacute;mero Interior">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="entreCalles" class="col-sm-2 control-label">Entre Calles</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="entreCalles" name="entreCalles" placeholder="Entre Calles">
						    </div>
						  </div>				  
						  <div class="form-group">
						    <label for="ciudadMunicipio" class="col-sm-2 control-label">Ciudad</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="ciudadMunicipio" name="ciudadMunicipio" placeholder="Ciudad">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="estado" class="col-sm-2 control-label">Estado</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="pais" class="col-sm-2 control-label">Pa&iacute;s</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="codigoPostal" class="col-sm-2 control-label">C&oacute;digo Postal</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="C&oacute;digo Postal">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="telefono" class="col-sm-2 control-label">T&eacute;lefono</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="T&eacute;lefono">
						    </div>
						  </div>
						  <input type="hidden" class="form-control" id="tipo" name="tipo" value="facturacion">
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i> Guardar</button>
						    </div>
						  </div>	
						  @endif						  
						  {!! Form::close() !!}
		  			</div>
  				</div>
    		</div>
    		<div role="tabpanel" class="tab-pane" id="envio">
    			<!-- panel facturacion -->
    			<div class="panel panel-default">  		
  				<!-- Default panel contents -->
		  			<div class="panel-heading">Direcci&oacute;n de env&iacute;o</div>
		  			<div class="panel-body">
		  				{!! Form::open(['route'=> 'addresses.store', 'id'=>'address-form', 'method' => 'POST']) !!}
		  				@if($envio->count() > 0)
		    			<div class="form-group">
						    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">						    
							  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $envio[0]["nombre"] }}">						      
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" value="{{ $envio[0]["apellidoPaterno"] }}" >
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoMaterno" class="col-sm-2 control-label">Apellido Materno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" value="{{ $envio[0]["apellidoMaterno"] }}">
						    </div>
					  	</div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">						    
						      <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="{{ $envio[0]["calle"] }}">		        
						      </div>
						  </div>
						  <div class="form-group">
						    <label for="numero" class="col-sm-2 control-label">N&uacute;mero</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" value="{{ $envio[0]["numero"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="numerointerior" class="col-sm-2 control-label">N&uacute;mero Interior</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numerointerior" name="numerointerior" placeholder="N&uacute;mero Interior" value="{{ $envio[0]["numerointerior"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="entreCalles" class="col-sm-2 control-label">Entre Calles</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="entreCalles" name="entreCalles" placeholder="Entre Calles" value="{{ $envio[0]["entreCalles"] }}">
						    </div>
						  </div>				  
						  <div class="form-group">
						    <label for="ciudadMunicipio" class="col-sm-2 control-label">Ciudad</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="ciudadMunicipio" name="ciudadMunicipio" placeholder="Ciudad"  value="{{ $envio[0]["ciudadMunicipio"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="estado" class="col-sm-2 control-label">Estado</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ $envio[0]["estado"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="pais" class="col-sm-2 control-label">Pa&iacute;s</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s" value="{{ $envio[0]["pais"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="codigoPostal" class="col-sm-2 control-label">C&oacute;digo Postal</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="C&oacute;digo Postal" value="{{ $envio[0]["codigoPostal"] }}">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="telefono" class="col-sm-2 control-label">T&eacute;lefono</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="T&eacute;lefono" value="{{ $envio[0]["telefono"] }}">
						    </div>
						  </div>
						  <input type="hidden" class="form-control" id="tipo" name="tipo" value="envio">
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i> Guardar</button>
						    </div>
						  </div>					
						  @else
						  <div class="form-group">
						    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">						    
							  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">	      
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno">
						    </div>
					  	</div>
					  	<div class="form-group">
						    <label for="apellidoMaterno" class="col-sm-2 control-label">Apellido Materno</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno">
						    </div>
					  	</div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">						    
						      <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">		        </div>
						  </div>
						  <div class="form-group">
						    <label for="numero" class="col-sm-2 control-label">N&uacute;mero</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="numerointerior" class="col-sm-2 control-label">N&uacute;mero Interior</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="numerointerior" name="numerointerior" placeholder="N&uacute;mero Interior">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="entreCalles" class="col-sm-2 control-label">Entre Calles</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="entreCalles" name="entreCalles" placeholder="Entre Calles">
						    </div>
						  </div>				  
						  <div class="form-group">
						    <label for="ciudadMunicipio" class="col-sm-2 control-label">Ciudad</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="ciudadMunicipio" name="ciudadMunicipio" placeholder="Ciudad">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="estado" class="col-sm-2 control-label">Estado</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="pais" class="col-sm-2 control-label">Pa&iacute;s</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="codigoPostal" class="col-sm-2 control-label">C&oacute;digo Postal</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="C&oacute;digo Postal">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="telefono" class="col-sm-2 control-label">T&eacute;lefono</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="T&eacute;lefono">
						    </div>
						  </div>
						  <input type="hidden" class="form-control" id="tipo" name="tipo" value="envio">
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i> Guardar</button>
						    </div>
						  </div>	
						  @endif	  
						  {!! Form::close() !!}
		  			</div>
  				</div>
    		</div>
    	</div>  		
  	</div>
  	
</div>
@endsection

@section('misScripts')
<script type="text/javascript">
	jQuery('#myTabs a').click(function (e) {
	  e.preventDefault()
	jQuery(this).tab('show')
	})

	jQuery('#myTabs a:first').tab('show') // Select first tab
	jQuery('#myTabs a:last').tab('show') // Select last tab	

</script>
@endsection