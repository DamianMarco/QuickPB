
@extends('admin.templates.main')
@section('title', 'Ubicación')

@section('content')
<div id="subhead_container">    
	<div class="row">
		<div class="panel panel-default">
  			<div class="panel-heading"><h2>UBICACI&Oacute;N</h2></div>
  			<div class="panel-body">
          <div class="row">
            <div class="col-sm-7" id="map-container">              
            </div>
            <div class="col-sm-5" id="address-container">
              <p>
                Con gusto lo atenderemos en nuestras instalaciones <br />
                ubicadas en: <br /><br /> 
                <h3>8682 San Gabriel <br/>                
                Laredo, Texas, USA 78041 <br /></h3>
                <br /><br />
                Aqu&iacute; usted podr&aacute; recoger personalmente <br />
                sus paquetes.<br /><br />
                Recuerde que una vez que se registre con nosotros esta <br />
                ser&acute; su nueva direcci&oacute;n en Estados Unidos.

              </p>
            </div>
          </div>    			 
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) >
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed >
            <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script-->
            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script>	
         
              function init_map() 
              {
              		var var_location = new google.maps.LatLng(27.5924309152667,-99.49913710355759);
               
                      var var_mapoptions = {
                        center: var_location,
                        zoom: 14
                      };
               
              		var var_marker = new google.maps.Marker({
              			position: var_location,
              			map: var_map,
              			title:"QUICK PO BOX"});
               
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