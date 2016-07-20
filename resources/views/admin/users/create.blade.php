@extends('admin.templates.main')
@section('title', 'Usuarios')

@section('content')
<div id="subhead_container">

		<div class="row">

		<div class="twelve columns">

		<h1>Mi cuenta</h1>

			</div>

	</div>
</div>



<div id="left-col">

<div class="post-entry">

	<div class="woocommerce">


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



<div class="row">
  <div class="col-md-6">

	<h2>Iniciar Sesión</h2>

			{!! Form::open(['route'=> 'users.authenticate','id' => 'formLogin', 'method' => 'POST', 'class' => 'login']) !!}


				<p class="form-row form-row-wide">

					{!! htmlspecialchars_decode(Form::label('nombreUsuario', 'Nombre de Usuario o correo electrónico <span class="required">*</span>')) !!}
					{!!form::text('nombreUsuario',null, ['class'=>'input-text', 'placeholder' =>'Usuario / Correo', 'id'=>'nombreUsuario', 'required'])!!}

				</p>
				<p class="form-row form-row-wide">

	{!! htmlspecialchars_decode(Form::label('password', 'Contraseña <span class="required">*</span>')) !!}
					{!!form::password('password',['class'=>'input-text', 'placeholder' =>'Contraseña', 'id'=>'password', 'required'])!!}
				</p>


				<p class="form-row">
				<button type="submit" class='btn btn-default' name='login'><i class="fa fa-user"></i> Iniciar Sesión</button>
				</p>
					<label for="remember" class="inline">
						<input name="remember" type="checkbox" id="remember"> Recordarme</label>
				</p>
				<p class="lost_password">
					<a href="{{URL('password/reset')}}">¿Olvidaste la contraseña?</a>
				</p>


			{!! Form::close() !!}

  </div>
  <div class="col-md-6">

<h2>Registrate</h2>

			{!! Form::open(['route'=> 'users.store','id' => 'formRegister', 'method' => 'POST', 'class' => 'register']) !!}

				<p class="form-row form-row-wide">

	{!! htmlspecialchars_decode(Form::label('nombreUsuario', 'Nombre de Usuario <span class="required">*</span>')) !!}
				{!!form::text('nombreUsuario',null, ['class'=>'input-text', 'placeholder' =>'usuario', 'id'=>'nombreUsuario', 'required'])!!}

				</p>


			<p class="form-row form-row-wide">
{!! htmlspecialchars_decode(Form::label('email', 'Dirección de correo electrónico <span class="required">*</span>')) !!}
				{!!form::email('email',null, ['class'=>'input-text', 'placeholder' =>'ejemplo@correo.com', 'id'=>'email', 'required'])!!}
			</p>


				<p class="form-row form-row-wide">

				{!! htmlspecialchars_decode(Form::label('password', 'Contraseña <span class="required">*</span>')) !!}
				{!!form::password('password',['class'=>'input-text', 'placeholder' =>'Contraseña', 'id'=>'password', 'required'])!!}
				</p>


			<!-- Spam Trap -->
			<div style="left: -999em; position: absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" tabindex="-1"></div>


			<p class="form-row">
				<button type="submit" class='btn btn-default'><i class="fa fa-pencil"></i> Registrarse</button>
			</p>
<br>

		{!! Form::close() !!}

  </div>
</div>



</div>
<p>&nbsp;</p>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Términos y condiciones</h4>
      </div>
      <div class="modal-body">
        <div id="Terminos_contenido" style="max-height: 500px; overflow: auto;"></div>

      </div>
      <div class="modal-footer">
        <button id="btnCancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id='btnAceptar' type="button" class="btn btn-primary">Acepto términos y condiciones</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
@section('misScripts')

<script type="text/javascript">
 jQuery('#formRegister').submit(function (e) {
	 jQuery("#btnAceptar").prop('disabled','true');
   jQuery('#modal').modal();
   jQuery('#Terminos_contenido').html(contrato);

	 	 return false;
 })
jQuery("#Terminos_contenido").scroll(function(){

	if (jQuery(this).scrollTop() == jQuery(this)[0].scrollHeight - jQuery(this).height()) {
			jQuery("#btnAceptar").removeAttr('disabled');

    }

});
jQuery("#btnAceptar").click(function(){
	jQuery("#formRegister").off('submit');
	jQuery("#formRegister").submit();
});
jQuery("#btnCancelar").click(function(){
	jQuery('#Terminos_contenido').scrollTop(0);
});
</script>
@endsection
