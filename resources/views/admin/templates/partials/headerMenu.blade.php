<div id="header_container">
	
		<!--header-->
	<div class="row">
		<div class="twelve columns">
	
			<div id="logo2"><a href="{{URL::to('/')}}" title="QuickPOBox">QuickPOBox</a></div><!--logo end-->
		
			

	
	<!--top menu-->
			<div id="menu_container">
		
			
	
 <div class="menu-header2"><ul id="nav" class="menu sf-js-enabled sf-shadow"><li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-129"><a href="http://www.quickpobox.com/nosotros/" class="sf-with-ul"><i class="fa fa-group"></i> Nosotros</a>
<ul class="sub-menu" style="display: none; visibility: hidden;">
	<li id="menu-item-128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-128"><a href="http://www.quickpobox.com/ubicacion/"><i class="fa fa-thumb-tack"></i> Ubicación</a></li>
	<li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-126"><a href="http://www.quickpobox.com/contacto/"><i class="fa fa-btn fa-envelope"></i>  Contacto</a></li>
</ul>
</li>

<li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-129"><a href="#" class="sf-with-ul"><i class="fa fa-tasks"></i> Servicios</a>
<ul class="sub-menu" style="display: none; visibility: hidden;">
	<li id="menu-item-128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-128"><a href="http://www.quickpobox.com/ubicacion/"><i class="fa fa-shopping-cart"></i> Tienda</a></li>
	<li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-126"><a href="http://www.quickpobox.com/contacto/"><i class="fa fa-shopping-bag"></i> Tipos de membresías</a></li>
</ul>
</li>


    <!-- Authentication Links -->
    @if (Auth::user())
    	@if (Auth::user()->rol == "admin")
    		<!--li><a href="{{ route('packages.view') }}"><i class="fa fa-archive"></i> Asignar paquete</a></li-->
    		<li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-129"><a href="#" class="sf-with-ul"><i class="fa fa-archive" aria-hidden="true"></i> Administrar Paquetes</a>
<ul class="sub-menu" style="display: none; visibility: hidden;">
	<li id="menu-item-128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-128"><a href="{{ route('packages.create') }}"><i class="fa fa-get-pocket" aria-hidden="true"></i> Recibir paquete</a></li>
	<li id="menu-item-128" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-128"><a href="{{ route('packages.view') }}"><i class="fa fa-get-pocket" aria-hidden="true"></i> Ver paquetes</a></li>	
</ul>
</li>

    	@else
		    <li><a href="{{ route('packages.view') }}"><i class="fa fa-archive"></i> Mis Paquetes</a></li>
		    <li><a href="{{ url('pays/pagos') }}"><i class="fa fa-archive"></i> Mis Pagos</a></li>
		     	<li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		               <i class="fa fa-street-view"></i> {{ Auth::user()->nombreUsuario }} 
		            </a>

		            <ul class="dropdown-menu" role="menu">
		            	<li><a href="{{ route('addresses.view') }}"><i class="fa fa-user"></i> Mi cuenta</a></li>
		            	<li><a href="{{ route('packages.view') }}"><i class="fa fa-archive"></i> Mis Paquetes</a></li>
		                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
		            </ul>
		        </li>
	     @endif
    @else
        <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> Inicia sesión</a></li>
        <li><a href="{{ route('users.create') }}"><i class="fa fa-pencil"></i> ¡Registrate!</a></li>
    @endif
                

</ul>







</div>  

	</div>
	
		</div>
		</div>
		
	</div>