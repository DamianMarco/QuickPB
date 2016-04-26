
@extends('admin.templates.main')
@section('title', 'Servicios')

@section('content')

<div id="subhead_container">    
	<div class="row">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingOne">
      				<h4 class="panel-title">
	        			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	      				<i class="fa fa-flag-checkered" aria-hidden="true"></i> DIRECCI&Oacute;N EN ESTADOS UNIDOS
	        			</a>
      				</h4>
    			</div>
    			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      				<div class="panel-body">
        				DIRECCION EN ESTADOS UNIDOS CONTENIDO
      				</div>
    			</div>
  			</div>
  			<div class="panel panel-default">
	 			<div class="panel-heading" role="tab" id="headingTwo">
      				<h4 class="panel-title">
        				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          				<i class="fa fa-truck" aria-hidden="true"></i> SERVICIO DE  FORWARDING
        				</a>
      				</h4>
    			</div>
    			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      				<div class="panel-body">
        Te ofrecemos una dirección física en Laredo Tx en donde recibiremos tu mercancía de cualquier parte del mundo  para posteriormente enviarlos a la dirección de su casa o negocio en cualquier parte de la republica) 
      				</div>
    			</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingThree">
      				<h4 class="panel-title">
        				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          				<i class="fa fa-life-ring" aria-hidden="true"></i> ASESORIA EN COMERCIO INTERNACIONAL
        				</a>
      				</h4>
    			</div>
    			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      				<div class="panel-body">
    				<i class="fa fa-life-ring" aria-hidden="true"></i> ASESORIA EN COMERCIO INTERNACIONAL CONTENIDO
      				</div>
				</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingFour">
      				<h4 class="panel-title">
        				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          				<i class="fa fa-cart-plus" aria-hidden="true"></i> IMPORTANCIONES Y TRANSPORTACI&Oacute;N
        				</a>
      				</h4>
    			</div>
    			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      				<div class="panel-body">
        			Ofrecemos servicios de transportación con seguro de mercancía , recepción y almacenaje de sus mercancías)
      				</div>
				</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingFive">
      				<h4 class="panel-title">
        				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          				<i class="fa fa-list-ol" aria-hidden="true"></i> LOG&Iacute;STICA
        				</a>
      				</h4>
    			</div>
    			<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      				<div class="panel-body">
Desde que recibimos su mercancía nos encargamos de todo hasta que recibe su mercancía en su hogar o negocio)
      				</div>
				</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingSix">
      				<h4 class="panel-title">
        				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          				<i class="fa fa-desktop" aria-hidden="true"></i> MONITOREO EN L&Iacute;NEA
        				</a>
      				</h4>
    			</div>
    			<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      				<div class="panel-body">
    				Por medio de nuestra plataforma electrónica puede revisar el estatus de su mercancía)
      				</div>
				</div>
  			</div>
		</div>
	</div>
</div>
@endsection

