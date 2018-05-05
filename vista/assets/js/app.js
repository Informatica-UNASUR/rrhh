// Conexion a ajax por medio de jquery
// Contendra todo el archivo de configuracion por medio de ajax
$(document).ready(function() {
    // Cuando se envie el form de login automaticamente se ejecute el ajax
    $("#login").bind("submit", function () { //.bind captura un evento submit y ejecuta algo
        $.ajax({
            type: $(this).attr("method"),   // Captura el atributo del form, POSt
            url: $(this).attr("action"),    // Obtiene validarCode.php
            data: $(this).serialize(),      // los campos a recuperar
            beforeSend: function () {
                $("#login button[type=submit]").html("Enviando...");
                $("#login button[type=submit]").attr("disabled", "disabled");
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
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o password incorrectos!"
                    });
                }
                $("#login button[type=submit]").html("Ingresar");
                $("#login button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrectos!",
                });
                $("#login button[type=submit]").html("Ingresar");
                $("#login button[type=submit]").removeAttr("disabled");

            }
        });
       return false;
    }); // Captura el evento
});