@extends('admin.templates.main')
@section('title', 'Usuarios')

@section('content')


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
            

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Usuarios</h3></div>
  <div class="panel-body">
    <div class="alert" role="alert">  		
	</div>

    <table id="grid-command-buttons" class="table table-condensed table-hover table-striped">
        <thead>
            <tr>
                <th>Suite</th>
                <th>E-mail</th>
                <th>Usuario</th>
                <th>Estatus</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody> 
        @foreach( $users as $user )
            <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->nombreUsuario}}</td>
            <td>
                <input type="checkbox" name="activeUser" id="{{$user->id}}" data-text-label="user"  data-off-text="Inactivo" data-on-text="Activo" 
                @if ($user->estatus === "activo" )
                    checked
                @endif>
            </td>
            <td>
                <input type="checkbox" name="typeUser" id="{{$user->id}}" data-text-label="user"  data-off-text="Cliente" data-on-text="Administrador" 
                @if ($user->rol === "admin" )
                    checked
                @endif>
            </td>
            </tr>
        @endforeach
    </table>
  
	</div>	
</div>


@endsection

@section('misScripts')
    <script type="text/javascript" src="{{asset('vendor/bootstrap3_3_6/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootbox/bootbox.min.js')}}"></script>

<script type="text/javascript">

var lastControl;
var controlEnter;
    jQuery(document).ready(function(){
        //jQuery("[name='my-checkbox']").bootstrapSwitch();
        jQuery.fn.bootstrapSwitch.defaults.size = 'small';
        jQuery.fn.bootstrapSwitch.defaults.onColor = 'primary';
        jQuery('input[type="checkbox"]').bootstrapSwitch();

        jQuery('input[name="activeUser"]').on('switchChange.bootstrapSwitch', function(event, state) {
            lastControl = this;
            if(lastControl != controlEnter)
            {
                controlEnter=this;
                jQuery(this).bootstrapSwitch('state', !state, true);
                var switchControl = this;
                var mensaje = state?"¿ Desea Activar al usuario ?":"¿ Desea desactivara al usuario ?";
                bootbox.confirm(mensaje, function(result) {
                  if(result)
                  {

                    var formData = new FormData();
                        formData.append("id_user", switchControl.id);
                        formData.append("enable", state);
                    
                    jQuery.ajax({
                            type: "POST",
                            url: virtualPath + "/users/changeActive",
                            data: formData,
                            beforeSend: beforeSendAjax,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            contentType: false,
                            success: mysuccess,
                            error: myerror,
                            complete: function () {
                                jQuery('#ajax').modal('hide');
                                jQuery(switchControl).bootstrapSwitch('toggleState'); 
                            }

                        },"json");

                  }
                  else
                  {
                    controlEnter = null;
                  }
                }); 
            }
            else
            {
                controlEnter = null;
            }
        });


        jQuery('input[name="typeUser"]').on('switchChange.bootstrapSwitch', function(event, state) {
            lastControl = this;
            if(lastControl != controlEnter)
            {
                controlEnter=this;
                jQuery(this).bootstrapSwitch('state', !state, true);
                var switchControl = this;
                var mensaje = !state?"¿ Cambiar el usuario a Administrador ?":"¿ Cambiar usuario a Cliente ?";
                bootbox.confirm(mensaje, function(result) {
                  if(result)
                  {
                    var formData = new FormData();
                    formData.append("id_user", switchControl.id);
                    formData.append("type", state);
                    
                    jQuery.ajax({
                            type: "POST",
                            url: virtualPath + "/users/changeTypeUser",
                            data: formData,
                            beforeSend: beforeSendAjax,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            contentType: false,
                            success: mysuccess,
                            error: myerror,
                            complete: function () {
                                jQuery('#ajax').modal('hide');
                                jQuery(switchControl).bootstrapSwitch('toggleState'); 
                            }

                        },"json");
                  }
                  else
                  {
                    controlEnter = null;
                  }
                }); 
            }
            else
            {
                controlEnter = null;
            }
        });



        jQuery('input[type="checkbox"]').on('switch-change', function (e, data) {
            e.preventDefault();
            var $el = $(data.el)
              , value = data.value;
            alert(e +" -- " + $el +" -- " + value);
        });

    });



    function mysuccess(info) {
        if(info.success === 'true'){
            Mensaje("Éxito", info.mensaje);
            jQuery("#facturaimg").attr("src", info.filename);
            jQuery("#afacturaimg").attr("href", info.filename)
            valIdPac = jQuery("#paquete_id").val();
            jQuery("#" + valIdPac + "tr").addClass("info");
            jQuery("#" + valIdPac + "modalF").attr("onclick", "modalFactura('" + valIdPac + "', '"+ info.filename +"')");
          }
       else
            MessageWarning("Aviso", info.mensaje);
    }

    

    function myerror(info) {
        Error("Error", info.responseText);
    }


</script>


@endsection
