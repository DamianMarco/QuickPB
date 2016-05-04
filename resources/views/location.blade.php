
@extends('admin.templates.main')
@section('title', 'Ubicación')

@section('content')
<div id="subhead_container">    
	<div class="row">
		<div class="panel panel-default">
  			<div class="panel-heading"><h2>UBICACI&Oacute;N</h2></div>
  			<div class="panel-body">
    			 <div id="map-container" class="col-md-6"></div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) >
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed >
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script-->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>	
 
      function init_map() {
		var var_location = new google.maps.LatLng(45.430817,12.331516);
 
        var var_mapoptions = {
          center: var_location,
          zoom: 14
        };
 
		var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title:"Venice"});
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
 
		var_marker.setMap(var_map);	
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);
 
    </script>

  			</div>
		</div>
    </div>
</div>
@endsection