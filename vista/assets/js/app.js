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

    // $("#eliminarDepartamento").bind("submit", function(){
    //     $.ajax({
    //         type: $(this).attr("method"),
    //         url: $(this).attr("action"),
    //         data: $(this).serialize(),
    //         beforeSend: function () {
    //             $("#eliminarDepartamento button[type=submit]").html("Enviando...");
    //             $("#eliminarDepartamento button[type=submit]").attr("disabled", "disabled");
    //         },
    //         success: function (response) {
    //             console.log(response);
    //             if (response.valor == "true") {
    //                 $("body").overhang({
    //                     type: "success",
    //                     message: "Departamento eliminado correctamente 🙂",
    //                     duration: 1,
    //                     callback: function () {
    //                         window.location.href = "departamento.php";
    //                     }
    //                 });
    //             } else {
    //                 $("body").overhang({
    //                     type: "error",
    //                     message: "No eliminado!"
    //                 });
    //             }
    //             $("#eliminarDepartamento button[type=submit]").html("Eliminar");
    //             $("#eliminarDepartamento button[type=submit]").removeAttr("disabled");
    //         }
    //     });
    //     return false;
    // });

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

    $('#dtRol').DataTable({
        searching: false,
        paging: false
        // info: false
    });

    listarDepartamentos();
    listarEmpleados();
    listarAuditoria();
    guardar();
    eliminar();
    agregar();
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

var guardar = function () {
    $("#editarDepartamento").on("submit", function (e) {
        e.preventDefault(); // evita recarga de la page
        var data = $(this).serialize();  // Serializamos los campos del frm
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",   // url para la peticion
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            listarDepartamentos();
            $('#editarDepartamentoModal2').modal('hide');
        });
    });

    $("#editarEmpleado").on("submit", function (e) {
        e.preventDefault(); // evita recarga de la page
        var data = $(this).serialize();  // Serializamos los campos del frm
        $.ajax({
            method: "POST",
            url: "empleadoRequest.php",   // url para la peticion
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            listarEmpleados();
            $('#editarEmpleadoModal2').modal('hide');
        });
    });
};

var agregar = function () {
    $("#nuevoDepartamento").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                $('#dtDepartamento').DataTable().ajax.reload();
                $('#agregarDepartamentoModal').modal('hide');
                $('#nombreDepartamento').val("");
            }
            mensajes(json_info);
        });
    });
};

var eliminar = function () {
    $("#eliminarDepartamento").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            listarDepartamentos();
            $('#eliminarDepartamentoModal2').modal('hide');
        });
    });
};

var listarDepartamentos = function () {
    var table = $('#dtDepartamento').DataTable({
        "destroy": true,
        // pagingType: "first_last_numbers",
        // pageLength: 9,
        // lengthMenu: [ 9, 15, 25, 100 ],
        // sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        // sDom: "<'row'<'col-sm-12'f>>" +
        // "<'row'<'col-sm-12'tr>>" +
        // "<'row'<'col-sm-6'l><'col-sm-6'p>><'row'<'col-sm-12'i>>"
        // "<'col-sm-12'p<br/>><'row'<'col-sm-12'i>>"
        "ajax": {
            "method": "POST",
            "url": "http://localhost:81/dev/rrhh/vista/getdepartamento.php"
        },
        // Columnas con la que vamos a trabajar
        "columns": [
            {"data":"idDepartamento"},
            {"data":"nombreDepartamento"},
            {"sDefaultContent": "<td>\n" +
                "<a class=\"editarDpto\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarDepartamentoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "<a class=\"eliminarDpto\" href=\"#\" data-toggle=\"modal\" data-target=\"#eliminarDepartamentoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Eliminar\" style=\"color: #F44336;\">delete</i></a>                                    \n" +
                "</td>",
                "className": "text-center"
            }
        ]
    });
    accion_departamento("#dtDepartamento tbody", table);
};

var listarAuditoria = function() {
    var tableAuditoria = $('#dtAuditoria').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "http://localhost:81/dev/rrhh/vista/getAuditoria.php"
        },
        // Columnas con la que vamos a trabajar
        "columns": [
            {"data":"fechaHora"},
            {"data":"usuarioAuditoria"},
            {"data":"accion"},
            {"data":"tabla"},
            {"data":"nombreColumna"},
            {"data":"nuevaDescripcion"},
            {"data":"antiguaDescripcion"}
        ]
    });
};

var listarEmpleados = function() {
    var tableEmpleado = $('#dtEmpleado').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "http://localhost:81/dev/rrhh/vista/getEmpleado.php"
        },
        "columns": [
            {data: "ci"},
            {"render":
                function ( data, type, row ) {
                    return (row['nombre']+' '+row['apellido']);
                }
            },
            {data:"nombreDepartamento"},
            {data:"nombreCargo"},
            {data:"estado",
                render: function ( data, type, row) {
                    if(row['estado'] === 1) {
                        return '<td id="empleadoActivo"><span class="badge badge-success">Activo</span></td>'
                    } else {
                        return '<td id="empleadoInactivo"><span class="badge badge-secondary">Inactivo</span></td>'
                    }
                },
                "className": "text-center"
            },
            {sDefaultContent: "<td class=\"text-center\">\n" +
                "<a class=\"editarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarEmpleadoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "<a class=\"eliminarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#eliminarEmpleadoModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Eliminar\" style=\"color: #F44336;\">delete</i></a>                                    \n" +
                "</td>",
                "className": "text-center"}
        ]
    });
    var tableNomina = $('#dtNomina').DataTable({
        paging: false,
        searching: false,
        info: false,
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "http://localhost:81/dev/rrhh/vista/getEmpleado.php"
        },
        "columns": [
            // {data: "ci"},
            {"render":
                function ( data, type, row ) {
                    return (row['nombre']+' '+row['apellido']);
                }
            }
            // {data:"nombreDepartamento"},
            // {data:"nombreCargo"},
        //     {data:"estado",
        //         render: function ( data, type, row) {
        //             if(row['estado'] === 1) {
        //                 return '<td id="empleadoActivo"><span class="badge badge-success">Activo</span></td>'
        //             } else {
        //                 return '<td id="empleadoInactivo"><span class="badge badge-secondary">Inactivo</span></td>'
        //             }
        //         },
        //         "className": "text-center"
        //     },
        //     {sDefaultContent: "<td class=\"text-center\">\n" +
        //         "<a class=\"editarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarEmpleadoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
        //         "<a class=\"eliminarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#eliminarEmpleadoModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Eliminar\" style=\"color: #F44336;\">delete</i></a>                                    \n" +
        //         "</td>",
        //         "className": "text-center"}
        ]
    });
    var tableSalario = $('#dtSalario').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "http://localhost:81/dev/rrhh/vista/getSalario.php"
        },
        "columns": [
            {data: "ci"},
            {"render":
                    function ( data, type, row ) {
                        return (row['nombre']+' '+row['apellido']);
                    }
            },
            {data:"salarioFijo"},
            {data:"tipoContrato"},
            {sDefaultContent: "<td class=\"text-center\">\n" +
                "<a class=\"editarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarEmpleadoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "</td>",
                "className": "text-center"}
        ]
    });
    accion_empleado("#dtEmpleado tbody", tableEmpleado);
/*
    $('#dtEmpleado tbody').on('click', 'tr', function () {
        var data = tableEmpleado.row( this ).data();
        alert( 'Ha clickeado sobre la fila ['+data['idEmpleado']+'] NOMBRES: '+data['nombre']+' '+data['apellido'] );
    } );
*/
};

var accion_departamento = function (tbody, table) {
    // Cuando se haga click en el boton editar
    $(tbody).on("click", "a.editarDpto", function () {
       // Obtenemos la data de cada fila seleccionada
       var data = table.row($(this).parents("tr")).data();
        // Seteamos las cajas de texto del modal
        var idDpto = $("#edit_id").val(data.idDepartamento),
            nombre = $("#edit_name").val(data.nombreDepartamento);
    });
    // Cuando se haga click en el boton eliminar
    $(tbody).on("click", "a.eliminarDpto", function () {
       var data = table.row($(this).parents("tr")).data();
       var idDpto = $("#id").val(data.idDepartamento),
           nombre = $("#name").val(data.nombreDepartamento);
       var nameDepartamento = $(this).parents("tr").find("td").eq(1).text();
       var dMsg = document.getElementById("d-msg");
        dMsg.innerHTML = nameDepartamento;
    });
};

var accion_empleado = function (tbody, table) {
    $(tbody).on("click", "a.editarEmpleado", function () {
       var data = table.row($(this).parents("tr")).data();
       var idEmpleado = $("#edit_id").val(data.idEmpleado);
       var nombreEmpleado = $("#edit_name").val(data.nombre);
       var apellidoEmpleado = $("#edit_ape").val(data.apellido);
       var ci = $("#edit_ci").val(data.ci);
       var sexo = $("#edit_sexo").val(data.sexo);
       var fechaNacimiento = $("#edit_fecha").val(data.fechaNacimiento);
       var telefono = $("#edit_telefono").val(data.telefono);
       var direccion = $("#edit_direccion").val(data.direccion);
       var email = $("#edit_email").val(data.email);
       var edit_cta = $("#edit_cta").val(data.numCuenta);
       var nacionalidad = $("#edit_nacionalidad").val(data.nacionalidad);
       var horario = $("#edit_horario").val(data.Horario_idHorario);
       var estadoCivil = $("#edit_civil").val(data.EstadoCivil_idEstadoCivil);
       var contrato = $("#edit_contrato").val(data.Contrato_idContrato);
       var fechaIn = $("#edit_ingreso").val(data.fechaAsume);
       var cargo = $("#edit_cargo").val(data.nombreCargo);
       var departamento = $("#edit_dpto").val(data.nombreDepartamento);

    });
    // Cuando se haga click en el boton eliminar
    $(tbody).on("click", "a.eliminarEmpleado", function () {
       var data = table.row($(this).parents("tr")).data();
        var idDpto = $("#id").val(data.idDepartamento),
            nombre = $("#name").val(data.nombreDepartamento);
        var nameDepartamento = $(this).parents("tr").find("td").eq(1).text();
        var dMsg = document.getElementById("d-msg");
        dMsg.innerHTML = nameDepartamento;
    });
};

var mensajes = function (informacion) {
    var texto = "", color = "";
    if (informacion.respuesta === "EXISTE") {
        texto = "EL departamento ya existe.";
        color = "#dc3545";
    }
    $('.msgExiste').html(texto).css({"color": color});
    $('#nombreDepartamento').css({"border-color": color});
};


