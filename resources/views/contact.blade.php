@extends('admin.templates.main')
@section('title', 'Contacto')

@section('content')
<div id="subhead_container">    
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
		<div class="panel panel-default">
  			<div class="panel-heading"><h2>CONTACTO</h2></div>
  			<div class="panel-body">
{!! Form::open(['route'=> 'contact.send', 'id'=>'contact-form', 'method' => 'POST']) !!}
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nombre Completo</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellidos" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Mensaje/Comentario</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="message"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="human" name="human" placeholder="Respuesta">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar</button>
		</div>
	</div>
{!! Form::close() !!}
</div>
		</div>
    </div>
</div>
@endsection