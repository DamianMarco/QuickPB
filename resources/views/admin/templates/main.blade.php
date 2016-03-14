<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','agrega title') | QuickPoBox</title>
	<!--link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap3_3_6/css/bootstrap.css')}}"-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/foundation/foundation.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/superfish.css')}}">
</head>
<body>
@include('admin/templates/partials/headerMenuOut')

@yield('content')

@include('admin/templates/partials/footer')

<script type="text/javascript" src="{{asset('vendor/jquery/jquery-1.11.3.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/superfish.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/jquery.custom.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/selectnav.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/discover/responsive-script.js')}}"></script>
<script type="text/javascript" src="{{asset('css/wpthemes/js/plugins/jquery.form.js')}}"></script>

<!--script type="text/javascript" src="{{asset('vendor/bootstrap3_3_6/js/bootstrap.js')}}"></script-->
</body>
</html>
