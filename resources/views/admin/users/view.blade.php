@extends('admin.templates.main')
@section('title', 'Usuarios')

@section('content')


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Usuarios</h3></div>
  <div class="panel-body">
    <div class="alert" role="alert">  		
	</div>

    <table id="grid-command-buttons" class="table table-condensed table-hover table-striped">
        <thead>
            <tr>
                <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                <th data-column-id="email">E-mail</th>
                <th data-column-id="nombreUsuario" data-order="desc">Usuario</th>
                <th data-column-id="estatus" data-sortable="false">Estatus</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
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
        url: "{{ url('users/list') }}",
        formatters: {
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-xs btn-default command-update\" data-row-id=\"" + row.id + "\" data-row-value=\"" + row.nombreUsuario + "\"><span class=\"fa fa-hand-pointer-o\"></span> Seleccionar</button>";
            }
        }
    }).on("loaded.rs.jquery.bootgrid", function()
    {
        /* Executes after data is loaded and rendered */
        grid.find(".command-update").on("click", function(e)
        {
            window.location = "{{ url('packages/take') }}/"+jQuery(this).data("row-id")+"/"+jQuery(this).data("row-value");
        });
    });
	 //var strJson = jQuery('#gridData').val(); 

     //var objJson = $.parseJSON(strJson);

     //alert(objJson);

	 //jQuery("#grid-data").bootgrid("append", objJson);
});
</script>

@endsection
