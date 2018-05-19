<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreDepartamento"])){

        $txtNombreDepartamento = validar_campo($_POST["txtNombreDepartamento"]);

        if(UsuarioControlador::registrarDepartamento($txtNombreDepartamento)) {
            header("location:departamento.php");
        }
    }
} else {
    header("location:registro.php?error=1");
}



