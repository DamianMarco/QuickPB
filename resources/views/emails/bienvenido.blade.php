@extends('emails.header')

@section('content')
	<div style="background-color: #fd7800; width: 100%; height: 4px; margin: 0px:">		
	</div>
	
	<div id="logo2"><a href="http://localhost:81/quickpb/public/index.php" title="QuickPOBox">QuickPOBox</a>
	</div><!--logo end-->
		<br/>  
	
	<div class="contenido">
	<h2>bienvenido!</h2>
		<h3>{{$name}}</h3>
	</div>
@endsection	
