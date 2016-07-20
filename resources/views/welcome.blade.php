
@extends('admin.templates.main')
@section('title', 'Bienvenido')

@section('content')
<!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
        	<!-- Inicio de carrusel -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
			    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	    			<li data-target="#carousel-example-generic" data-slide-to="3"></li>
	    			<li data-target="#carousel-example-generic" data-slide-to="4"></li>
		  		</ol>

				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
    				<div class="item active">
    					<img src="{{ asset('/images/laptop.png') }}" class="img-responsive center-block img-circle" />
      					<div class="carousel-caption">
      						<div class="degradadoAzul"><h3 style="color:#ffffff;">COMPRA LO QUE QUIERAS ONLINE</h3></div>
      					</div>
    				</div>
    				<div class="item">
                        <img src="{{ asset('/images/warehouse.png') }}" class="img-responsive center-block img-circle" />
      					<div class="carousel-caption">
      						<div class="degradadoAzul"><h3 style="color:#ffffff;">MANDALO A NOSOTROS EN ESTADOS UNIDOS</h3></div>
      					</div>
					</div>
					<div class="item">
                        <img src="{{ asset('/images/email.png') }}" class="img-responsive center-block img-circle" />
      					<div class="carousel-caption">
      						<div class="degradadoAzul"><h3 style="color:#ffffff;">TE AVISAMOS CUANDO LLEGUE</h3></div>
      					</div>
					</div>
					<div class="item">
                        <img src="{{ asset('/images/send.jpg') }}" class="img-responsive center-block img-circle" />
      					<div class="carousel-caption">
      						<div class="degradadoAzul"><h3 style="color:#ffffff;">AUTORIZA EL TRASLADO DE TU PAQUETE A MEXICO</h3></div>
      					</div>
					</div>
					<div class="item">
                        <img src="{{ asset('/images/recieve.jpg') }}" class="img-responsive center-block img-circle" />
      					<div class="carousel-caption">
      						<div class="degradadoAzul"><h3 style="color:#ffffff;">RECIBELO EN TU CASA</h3></div>
      					</div>
					</div>    
  				</div>

			  	<!-- Controls -->
			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
			</div>
			<!-- Fin de carrusel -->
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Conocenos</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/images/rack1.jpg') }}" alt="">
                    <div class="caption">
                        <h4>Desde USA a México</h4>
                        <p>Facilitamos el translado de USA a México.</p>
                        <p>
                            <!--a href="#" class="btn btn-default">Buy Now!</a--><a href="#" class="btn btn-primary">Ver más</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/images/rack2.jpg') }}" alt="">
                    <div class="caption">
                        <h4>Información en línea</h4>
                        <p>Podrás rastrear tu paquete de inicio a fin.</p>
                        <p>
                            <!--a href="#" class="btn btn-primary">Buy Now!</a--><a href="#" class="btn btn-primary">Ver más</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/images/rack3.jpg') }}" alt="">
                    <div class="caption">
                        <h4>Marcas de USA para tí</h4>
                        <p>Marcas de productos de Estados Unidos a tu alcance.</p>
                        <p>
                            <!--a href="#" class="btn btn-primary">Buy Now!</a--><a href="#" class="btn btn-primary">Ver más</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/images/rack4.jpg') }}" alt="">
                    <div class="caption">
                        <h4>Envios a todo México</h4>
                        <p>Tu compra en USA puede ser enviada a todo México.</p>
                        <p>
                            <!--a href="#" class="btn btn-primary">Buy Now!</a--><a href="#" class="btn btn-primary">Ver más</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
@endsection