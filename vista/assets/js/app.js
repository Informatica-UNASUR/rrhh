// Conexion a ajax por medio de jquery
// Contendra todo el archivo de configuracion por medio de ajax
$(document).ready(function() {
    // Cuando se envie el form de loginForm automaticamente se ejecute el ajax
    $("#loginForm").bind("submit", function () { //.bind captura un evento submit y ejecuta algo
        $.ajax({
            type: $(this).attr("method"),   // Captura el atributo del form, POSt
            url: $(this).attr("action"),    // Obtiene validarCode.php
            data: $(this).serialize(),      // los campos a recuperar
            beforeSend: function () {
                $("#loginForm button[type=submit]").html("Enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.valor == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario correcto, te estamos redirigiendo...",
                        callback: function () {
                            window.location.href = "admin.php";
                        }
                    });
                } else if (response.valor == "inactivo") {
                    $("body").overhang({
                        type: "warn",
                        message: "Usuario inactivo, contactar a soporte@rrhh.com",
                        duration: 2,
                        overlay: true
                        // closeConfirm: true
                        // upper: true
                    });
                }
                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrectos!",
                    overlay: true
                });
                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");

            }
        });
       return false;
    }); // Captura el evento

    $("#eliminarDepartamento").bind("submit", function(){
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function () {
                $("#eliminarDepartamento button[type=submit]").html("Enviando...");
                $("#eliminarDepartamento button[type=submit]").attr("disabled", "disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.valor == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Departamento eliminado correctamente 🙂",
                        duration: 1,
                        callback: function () {
                            window.location.href = "departamento.php";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "No eliminado!"
                    });
                }
                $("#eliminarDepartamento button[type=submit]").html("Eliminar");
                $("#eliminarDepartamento button[type=submit]").removeAttr("disabled");
            }
        });
        return false;
    });

    // Activa boton si no estan vacios
    $("#loginForm input").keyup(function () {
        var form = $(this).parents("#loginForm");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#ingresar").prop("disabled", false);
        } else {
            // $("#ingresar").
            $("#ingresar").prop("disabled", true);
        }
    });

    // Funcion a mejorar
    $("#editarRol input").keyup(function () {
        var form = $(this).parents("#editarRol");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#actualizarRol").prop("disabled", false);
        } else {
            $("#actualizarRol").prop("disabled", true);
        }
    });

    $("#nuevoUsuario input").keyup(function () {
        var form = $(this).parents("#nuevoUsuario");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#agregar").prop("disabled", false);
        } else {
            // $("#agregar").
            $("#agregar").prop("disabled", true);
        }
    });

    $.extend($.fn.dataTable.defaults, {
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    $('#dtDefault').DataTable({
        // "order": [[ 3, "asc" ]] Ordena por la columna 3
    });

    $('#dtDepartamento').DataTable({
        // pagingType: "first_last_numbers",
        pageLength: 9,
        lengthMenu: [ 9, 15, 25, 100 ],
        // sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        sDom: "<'row'<'col-sm-12'f>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'p>><'row'<'col-sm-12'i>>"
        // "<'col-sm-12'p<br/>><'row'<'col-sm-12'i>>"
    });

    $('#dtRol').DataTable({
        searching: false,
        paging: false
        // info: false
    });

    $.ajax({
        type: "POST",
        url: "getRoles.php",
        success: function (response) {
            $('.selecciona-rol select').html(response).fadeIn();
        }
    });


});

function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input").each(function () {
        var $this = $(this);
        if($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        }
    });
    if(camposRellenados == false) {
        return false;
    } else {
        return true;
    }
}
