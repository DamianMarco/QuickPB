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
                <th>Tel&eacute;fono</th>
                <th>Identificaci&oacute;n</th>
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
            <td>{{$user->telefono}}</td>
        @if ($user->rol === "cliente" )
            <td>
                @if(!isset($user->img_Ife))
                   <button type="button" class="btn btn-warning" id="{{ $user->id. 'modalF'}}" onclick="modalIFE('{{$user->id}}','{{ asset('/images_ids/docnobill.png')}}')" ><i class="fa fa-file-photo-o" aria-hidden="true"></i>Copia Identificaci&oacute;n</button>
                @else
                   <button type="button" class="btn btn-warning" id="{{ $user->id . 'modalF'}}" onclick="modalIFE('{{$user->id}}','{{ asset($user->img_Ife)}}')" ><i class="fa fa-file-photo-o" aria-hidden="true"></i>Copia Identificaci&oacute;n</button>
                @endif
            </td>
        @else
            <td>&nbsp;</td>
        @endif            
            </tr>
        @endforeach
    </table>
  
	</div>	
</div>

<!-- MODAL IFE -->
<div class="modal fade" id="modalIFE" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">
            Identificaci&oacute;n del cliente.
        </h4>
      </div>
      <div class="modal-body">
        
            <div class="form-group">             
                <div id="lightgallery">
                    <a href="{{ asset('/images_bills/docnobill.png') }}" id="aifeimg" data-download-url="{{ asset('/images_bills/docnobill.png') }}">
                        <img id="ifeimg" class="media-object fancybox" src="{{ asset('/images_bills/docnobill.png') }}" alt="Factura" height="100px" width="100px" >
                  </a>
                </div>             
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN MODAL IFE -->

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
                var mensaje = state?"¿ Desea Activar al usuario ?":"¿ Desea Desactivar al usuario ?";
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
                var mensaje = state?"¿ Cambiar el usuario a Administrador ?":"¿ Cambiar usuario a Cliente ?";
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


    function modalIFE(idUsuario, rutaImagen)
    {        
        jQuery("#lightgallery").lightGallery();

        if (rutaImagen.indexOf('.pdf')==-1)
        {
            jQuery("#ifeimg").attr("src", rutaImagen);
            jQuery("#aifeimg").attr("href", rutaImagen);
            jQuery("#aifeimg").attr("data-download-url", rutaImagen);
            
        }
        else
        {
            jQuery("#ifeimg").attr("src", "{{asset('images/pdficon.png')}}");
            jQuery("#aifeimg").attr("href", "{{asset('images/pdficon.png')}}");
            jQuery("#aifeimg").attr("data-download-url", rutaImagen);
        }
                    
         
        jQuery('#modalIFE').modal('show');
    }

    function mysuccess(info) {
        if(info.success === 'true'){
            Mensaje("Éxito", info.mensaje);
          }
       else
            MessageWarning("Aviso", info.mensaje);
    }

    

    function myerror(info) {
        Error("Error", info.responseText);
    }


</script>


@endsection
