
<div id="header_container">
	

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{URL::to('/')}}" title="QuickPOBox"><img alt="Brand" src="{{ asset('/images/logoQPOBox.png') }}"></a>
        <span class="separadorMenu">&nbsp;|&nbsp;	<br>|&nbsp;</span>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li  class="{{ Request::segment(1) === null ? 'active' : null }}"><a href="{{URL::to('/')}}"><i class="fa fa-home" aria-hidden="true"></i>  Bienvenido <span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-group"></i> Nosotros <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href={{URL::to('/us')}}><i class="fa fa-thumb-tack"></i> Quienes somos</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="fa fa-btn fa-envelope"></i> Contacto</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tasks"></i> Servicios <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href={{URL::to('/services')}}><i class="fa fa-briefcase"></i> Ofrecemos</a></li>
              <li><a href="#"><i class="fa fa-shopping-bag"></i> Tipos de membresías</a></li>
            </ul>
          </li>
        </ul>

  	<ul class="nav navbar-nav navbar-right">
  	@if (Auth::user())
      	@if (Auth::user()->rol == "admin")
  				 <li class="dropdown {{ Request::segment(1) === 'packages' ? 'active' : null }}">
  	          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-archive" aria-hidden="true"></i> Administrar Paquetes <span class="caret"></span></a>
  			          <ul class="dropdown-menu">
  			             <li class="{{ Request::segment(2) ==='create' ? 'active' : null }}"><a href="{{ route('packages.create') }}"><i class="fa fa-get-pocket" aria-hidden="true"></i> Recibir paquete</a></li>
  				        <li class="{{ Request::segment(2) ==='packagesview' ? 'active' : null }}"><a href="{{ route('packages.packagesview') }}"><i class="fa fa-archive" aria-hidden="true"></i> Ver paquetes</a></li>
  				        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
  			          </ul>
  	       </li>

      	@else
   			<li class="{{ Request::segment(1) === 'packages' ? 'active' : null }}"><a href="{{ route('packages.packagesview') }}"><i class="fa fa-archive"></i> Mis Paquetes</a></li>
  		    <li class="{{ Request::segment(1) === 'pays' ? 'active' : null }}"><a href="{{ url('pays/pagos') }}"><i class="fa fa-archive"></i> Mis Pagos</a></li>

          	<li class="dropdown {{ Request::segment(1) === 'addresses' ? 'active' : null }}">
            		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-street-view"></i> {{ Auth::user()->nombreUsuario }}  <span class="caret"></span></a>
  		          <ul class="dropdown-menu">
  		            	<li class="{{ Request::segment(1) === 'addresses' ? 'active' : null }}"><a href="{{ route('addresses.view') }}"><i class="fa fa-user"></i> Mi Domicilio</a></li>
  		            	<li class="{{ Request::segment(2) === 'packagesview' ? 'active' : null }}"> <a href="{{ route('packages.packagesview') }}"><i class="fa fa-archive"></i> Mis Paquetes</a></li>
  		                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
  		          </ul>
          	</li>
      	@endif
  	@else
          <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> Inicia sesión</a></li>
          <li><a href="{{ route('packages.create') }}"><i class="fa fa-pencil"></i> <strong>¡Registrate!</strong></a>
          </li>
      @endif 
      </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>	
</div>