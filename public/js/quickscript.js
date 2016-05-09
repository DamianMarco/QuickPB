function Mensaje(titulo, mensaje) {
    var _modal = "<div id='mjs' class='modal fade'><div class='modal-dialog'><div class='modal-content'>" +
      "<div class='modal-header bg-success'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title'>" + titulo + "</h4></div>" +
      "<div class='modal-body'><strong><p>" + mensaje + "</p></strong></div>" +
      "<div class='modal-footer'><button type='button' class='btn btn-success' onclick=\"jQuery('#mjs').modal('hide');\"><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Aceptar</strong></button></div>" +
      "</div></div></div>";



    jQuery("body").append(_modal);

    jQuery('#mjs').on('hidden.bs.modal', function () {
        jQuery("#mjs").remove();
    });

    jQuery('#mjs').modal('show');
}

function Informacion(titulo, datos) {
    var _modal = "<div id='info' class='modal fade'><div class='modal-dialog'><div class='modal-content'>" +
      "<div class='modal-header bg-info'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title'> " + titulo + "</h4></div>" +
      "<div class='modal-body'><strong><p>" + datos + "</p></strong></div>" + 
      "<div class='modal-footer'><button type='button' class='btn btn-info' onclick=\"jQuery('#info').modal('hide');\">Cerrar</button></div>" +
      "</div></div></div>";

    jQuery("body").append(_modal);

    jQuery('#info').on('hidden.bs.modal', function () {
        jQuery("#info").remove();
    });

    jQuery('#info').modal('show');
}

function MensajeImage(titulo, mensaje) {
    var _modal = "<div id='mjs' class='modal fade'><div class='modal-dialog'><div class='modal-content'>" +
      "<div class='modal-header bg-success'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title'>" + titulo + "</h4></div>" +
      "<div class='modal-body'><strong><p>" + mensaje + "</p></strong></div>" +
      "<div class='modal-footer'><button type='button' class='btn btn-success' onclick=\"closeandrefresh()\"><span class='glyphicon glyphicon-ok'></span>&nbsp;<strong>Aceptar</strong></button></div>" +
      "</div></div></div>";



    jQuery("body").append(_modal);

    jQuery('#mjs').on('hidden.bs.modal', function () {
        jQuery("#mjs").remove();
    });

    jQuery('#mjs').modal('show');
}

function MessageWarning(title, data) {
    var _modal = "<div id='info' class='modal fade'><div class='modal-dialog'><div class='modal-content'>" +
      "<div class='modal-header bg-warning'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> " +
      "<h4 class='modal-title'><i class='fa fa-exclamation-triangle' ></i> <strong> " + title + "</strong></h4></div>" +
      "<div class=' bs-callout modal-body'>" + data + "</div>" +
      "<div class='modal-footer'><button type='button' class='btn btn-warning' onclick=\"jQuery('#info').modal('hide');\"><i class='fa fa-exclamation-triangle' ></i>&nbsp;<strong>Cerrar</strong></button></div>" +
      "</div></div></div>";

    jQuery("body").append(_modal);

    jQuery('#info').on('hidden.bs.modal', function () {
        jQuery("#info").remove();
    });

    jQuery('#info').modal('show');
}

function Error(titulo, datos) {

    var _modal = "<div id='error' class='modal fade in' role='dialog'><div class='modal-dialog'><div class='modal-content'>" +
      "<div class='modal-header bg-danger'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title'>" + titulo + "</h4></div>" +
      "<div class='modal-body'><p><div class='validation-summary-errors'>" + datos + "</div></p></div>" +
      "<div class='modal-footer'><button type='button' class='btn btn-danger' onclick=\"jQuery('#error').modal('hide');\">Cerrar</button></div>" +
      "</div></div></div>";

    jQuery("body").append(_modal);

    jQuery('#error').on('hidden.bs.modal', function () {
        jQuery("#error").remove();
    });

    jQuery('#error').modal('show');
}

function beforeSendAjax() {

    var _progressBar = "<div class='progress progress-striped active'><div class='progress-bar progress-bar-warning'  role='progressbar' style='width: 100%'>";

    var _modal = "<div id='ajax' class='modal fade'><div class='modal-dialog'><div class='modal-content'>" +   
      "<div class='modal-body'><p class='text-center'><strong>Espere un momento por favor...<strong></p><p>" + _progressBar + "</p></div>" +
      "</div></div></div>";

    jQuery("body").append(_modal);

    jQuery('#ajax').on('hidden.bs.modal', function () {
        jQuery("#ajax").remove();
    });

    jQuery('#ajax').modal('show');
}

function Confirm(obj, msj, id) {
    jQuery(obj).confirmation({ title: msj, singleton: true, onConfirm: function () { Remove(id,obj); jQuery(obj).confirmation('hide') } });
}


function soloNumeros() {
    var e = event;
    e.returnValue = ((e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode == 32));
}

function soloLetras() {
    var e = event;
    e.returnValue = ((e.keyCode >= 97 && e.keyCode <= 122 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode == 32));

}

function soloNumerosyLetras() {
    var e = event;
    e.returnValue = ((e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 97 && e.keyCode <= 122 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode == 32));
}