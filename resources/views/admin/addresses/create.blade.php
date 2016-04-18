@extends('admin.templates.main')
@section('title', 'Direccion')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
  		<div class="panel panel-default">
  		<!-- Default panel contents -->
  			<div class="panel-heading">Direcci&oacute;n de facturaci&oacute;n</div>
  			<div class="panel-body">
  				{!! Form::open(['route'=> 'addresses.store', 'id'=>'address-form', 'method' => 'POST', 'class' => 'login']) !!}
    			<div class="form-group">
				    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nombre" placeholder="Nombre">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="apellidoPaterno" class="col-sm-2 control-label">Apellido Paterno</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="apellidoPaterno" placeholder="Apellido Paterno">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="apellidoMaterno" class="col-sm-2 control-label">Apellido Materno</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="apellidoMaterno" placeholder="Apellido Materno">
				    </div>
			  	</div>
				  <div class="form-group">
				    <label for="calle" class="col-sm-2 control-label">Calle</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="calle" placeholder="Calle">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="numero" class="col-sm-2 control-label">N&uacute;mero</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="numero" placeholder="N&uacute;mero">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="numerointerior" class="col-sm-2 control-label">N&uacute;mero Interior</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="numerointerior" placeholder="N&uacute;mero Interior">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="entreCalles" class="col-sm-2 control-label">Entre Calles</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="entreCalles" placeholder="Entre Calles">
				    </div>
				  </div>				  
				  <div class="form-group">
				    <label for="ciudadMunicipio" class="col-sm-2 control-label">Ciudad</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="ciudadMunicipio" placeholder="Ciudad">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="estado" class="col-sm-2 control-label">Estado</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="estado" placeholder="Estado">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="pais" class="col-sm-2 control-label">Pa&iacute;s</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="pais" placeholder="Pa&iacute;s">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="codigoPostal" class="col-sm-2 control-label">C&oacute;digo Postal</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="codigoPostal" placeholder="C&oacute;digo Postal">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="telefono" class="col-sm-2 control-label">T&eacute;lefono</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="telefono" placeholder="T&eacute;lefono">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Guardar</button>
				    </div>
				  </div>
				  {!! Form::close() !!}
  			</div>
  		</div>
  	</div>
</div>
@endsection