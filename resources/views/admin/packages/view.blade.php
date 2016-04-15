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
			<td><button type="button" class="btn btn-default">Ver Detalle</button></td>
			<td>{{$pack->contenido}}</td>
			<td>{{$pack->observaciones}}</td>
			<td>${{$pack->costo}} <span style="color:red;"> ** </span></td>
			<td><button type="button" class="btn btn-warning">Factura</button></td>
			<td><button type="button" class="btn btn-danger">Pagar</button></td>
			<td><button type="button" class="btn btn-success">Importar</button></td>
			</tr>
		@endforeach
		</tbody> 
	</table>
	</div>
	<div class="panel-footer">{!! $packages-> render()!!}</div>
</div>


@endsection
