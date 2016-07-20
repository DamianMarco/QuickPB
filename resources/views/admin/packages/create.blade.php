@extends('admin.templates.main')
@section('title', 'Recepción de Paquete')

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
	<div class="col-md-8 col-md-offset-3">		
	  
		<!-- panel facturacion -->
		<div class="panel panel-default">  		
			<!-- Default panel contents -->
			<div class="panel-heading">
			@if(isset($isEdit))
				 Editar Paquetes	
			@else
				Recepción de Paquete
			@endif
			</div>
			<div class="panel-body">
						
			@if(!is_null($paquete))			
				{!! Form::model($paquete, ['method' => 'POST','route' => ['packages.update']]) !!}
				{!! Form::hidden('id', $paquete->id) !!}				
				{!! Form::hidden('usuario_id', $paquete->usuario_id) !!}
			@else
				<div class="form-group">
			    	<label for="nombreUsuario" class="col-sm-2 control-label">Destinatario</label>
			    	<div class="col-sm-10">
			    	@if(isset($nombreUsuario))
			    		<!--div class="search form-group">
							<div class="input-group">
								 <a class="btn btn-default" href="{{ route('users.view') }}"><span class="icon glyphicon input-group-addon glyphicon-search"></span></a>								 					
								 <input type="text" disabled class="search-field form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Destinatario" value="{{ $nombreUsuario }}">
							</div>
						</div-->
			    		<div class="input-group">
					      <input type="text" disabled class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Destinatario" value="{{ $nombreUsuario }}">
					      <span class="input-group-btn">					        
					        <a class="btn btn-default" href="{{ route('users.view') }}" type="button">Buscar</a>
					      </span>
					    </div>
					@else						
						<div class="input-group">
					      <input type="text" disabled class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Destinatario" value="">
					      <span class="input-group-btn">					        
					        <a class="btn btn-default" href="{{ route('users.view') }}">Buscar</a>
					      </span>
					    </div>
					@endif	
					</div>
				</div>				
				 <br/> 
				 <br/> 
				 <br/>
				{!! Form::open(['route'=> 'packages.store', 'id'=>'recieve-form', 'method' => 'POST']) !!}
				@if(!isset($usuario_id))
					{!! Form::hidden('usuario_id', null) !!}
				@else
					{!! Form::hidden('usuario_id', $usuario_id) !!}
				@endif		
			@endif								
		  		<div class="form-group">
			    	<label for="folio" class="col-sm-2 control-label">Gu&iacute;a</label>
				    <div class="col-sm-10">						    					  
					   {!! Form::text('folio', null, ['class' => 'form-control', 'placeholder' => 'Folio']) !!}					         
				    </div>
		  		</div>
		  		<div class="form-group">
				    <label for="proveedor" class="col-sm-2 control-label">Proveedor</label>
				    <div class="col-sm-10">
				      {!! Form::text('proveedor', null, ['class' => 'form-control', 'placeholder' => 'Proveedor']) !!}
				    </div>
		  		</div>
		  	<div class="form-group">
			    <label for="alto" class="col-sm-2 control-label">Alto</label>
			    <div class="col-sm-10">
			      {!! Form::text('alto', null, ['class' => 'form-control', 'placeholder' => 'Alto']) !!}
			    </div>
		  	</div>
			  <div class="form-group">
			    <label for="largo" class="col-sm-2 control-label">Largo</label>
			    <div class="col-sm-10">						    
			      {!! Form::text('largo', null, ['class' => 'form-control', 'placeholder' => 'Largo']) !!}        
		      	</div>
			  </div>
			  <div class="form-group">
			    <label for="ancho" class="col-sm-2 control-label">Ancho</label>
			    <div class="col-sm-10">
			      {!! Form::text('ancho', null, ['class' => 'form-control', 'placeholder' => 'Ancho']) !!}        
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="peso" class="col-sm-2 control-label">Peso</label>
			    <div class="col-sm-10">
			      {!! Form::text('peso', null, ['class' => 'form-control', 'placeholder' => 'Peso']) !!}        
			    </div>			    
			  </div>
			  <div class="form-group">
			    <label for="costo" class="col-sm-2 control-label">Costo</label>
			    <div class="col-sm-10">
			      {!! Form::text('costo', null, ['class' => 'form-control', 'placeholder' => 'Costo']) !!}        
			    </div>			    
			  </div>
			  <div class="form-group">
			    <label for="estatus" class="col-sm-2 control-label">Estatus</label>
			    <div class="col-sm-10">
				    <!--select class="form-control" id="estatus" name="estatus" placeholder="Estatus">
					      	<option value="enLaredo" selected>En Laredo</option>	
					      	<option value="enCurso">En Curso</option>
					      	<option value="enTuCiudad">En Tu Ciudad</option>
					      	<option value="enEntrega">En Entrega</option>
					      	<option value="entregado">Entregado</option>
				      </select-->
				      {{ Form::select('estatus', ['enLaredo'=>'En Laredo', 'enCurso'=>'En Curso', 'enTuCiudad'=>'En Tu Ciudad','enEntrega'=>'En Entrega','entregado'=>'Entregado'], null, ['class' => 'form-control']) }}
				      <br/>
			      <!--input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus"-->
			    </div>
			  </div>				  
			  <!--div class="form-group">
			    <label for="suite" class="col-sm-2 control-label">Suite</label>
			    <div class="col-sm-10">
			      {!! Form::text('suite', null, ['class' => 'form-control', 'placeholder' => 'Suite']) !!}        
			    </div>
			  </div-->
			  <div class="form-group">
			    <label for="tipoPaquete" class="col-sm-2 control-label">Tipo Paquete</label>
			    <div class="col-sm-10">
			      <!--select class="form-control" id="tipoPaquete" name="tipoPaquete" placeholder="Tipo Paquete">
				      	<option value="sobre">Sobre</option>	
				      	<option value="paquete">Paquete</option>
				      	<option value="valija">Valija</option>
				      	<option value="otro">Otro</option>
			      </select-->
			      {{ Form::select('tipoPaquete', ['sobre'=>'Sobre', 'paquete'=>'Paquete', 'valija'=>'Valija','otro'=>'Otro'], null, ['class' => 'form-control']) }}			      
			      <br/>			      
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="contenido" class="col-sm-2 control-label">Contenido</label>
			    <div class="col-sm-10">
			      {!! Form::text('contenido', null, ['class' => 'form-control', 'placeholder' => 'Contenido']) !!}        
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
			    <div class="col-sm-10">
			      {!! Form::text('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Observaciones']) !!}
			    </div>
			  </div>
			  <!--div class="form-group">
			    <label for="enviarPaquete" class="col-sm-2 control-label">Enviar Paquete</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="enviarPaquete" name="enviarPaquete" placeholder="Enviar Paquete">
			    </div>
			  </div-->			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
				@if(isset($isEdit))
				 <div class="well center-block" style="max-width:400px"> 
					<button type="submit"  class="btn btn-warning btn-lg btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Actualizar</button> 
				</div>
				@else
				<div class="well center-block" style="max-width:400px"> 
					<button type="submit"  class="btn btn-warning btn-lg btn-block"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Asignar</button> 
				</div>
				@endif		

			     
			    </div>
			  </div>	
			  					  
			  {!! Form::close() !!}
			</div> <!--Cierre body de panel -->
		</div> <!-- Cierre de panel -->
</div>  <!-- Cierre de sección -->   		
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