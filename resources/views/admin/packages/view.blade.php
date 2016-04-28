@extends('admin.templates.main')
@section('title', 'Paquetes')

@section('content')


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Paquetes</h3></div>
  <div class="panel-body">
    <div class="alert" role="alert">  		
	</div>

    <table id="grid-command-buttons" class="table table-condensed table-hover table-striped">
        <thead>
            <tr> 
                <th data-column-id="usuario_id" data-identifier="true">Socio</th> 
                <th data-column-id="estatus">Estatus</th> 
                <th data-column-id="folio">Folio</th> 
                <th data-column-id="proveedor">Proveedor</th> 
                <th data-column-id="contenido">Contenido</th> 
                <th data-column-id="observaciones">Comentarios</th> 
                <th data-column-id="costo">Total a Pagar</th> 
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>  
                <!--th data-column-id="commands" data-formatter="commands" data-sortable="false">Pagar</th>  
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Importar</th-->  
            </tr>
        </thead>
    </table>
  
	</div>	
</div>


@endsection

@section('misScripts')

<script type="text/javascript">


jQuery(document).ready(function(){

  var grid = jQuery("#grid-command-buttons").bootgrid({
        ajax: true,
        post: function ()
        {
            return {
                id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
            };
        },
        ajaxSettings: 
        {
            method: "GET",
            cache: false
        },
        url: "{{ url('packages/list') }}",
        formatters: 
        {
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-warning command-bill\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-file-photo-o\" aria-hidden=\"true\"></i> Factura</button> " + 
                "<button type=\"button\" class=\"btn btn-danger command-pay\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i> Pagar</button> " + 
                "<button type=\"button\" class=\"btn btn-success command-send\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-send\" aria-hidden=\"true\"></i> Importar</button> ";
            }
        }
    }).on("loaded.rs.jquery.bootgrid", function()
    {
        /* Executes after data is loaded and rendered */
        grid.find(".command-bill").on("click", function(e)
        {
            window.location = "{{ url('packages/take') }}/"+jQuery(this).data("row-id")+"/"+jQuery(this).data("row-value");
        }).end().find(".command-pay").on("click", function(e)
        {
            window.location = "{{ url('packages/take') }}/"+jQuery(this).data("row-id")+"/"+jQuery(this).data("row-value");
        }).end().find(".command-send").on("click", function(e)
        {
            window.location = "{{ url('packages/take') }}/"+jQuery(this).data("row-id")+"/"+jQuery(this).data("row-value");
        });
    });
});
</script>

@endsection