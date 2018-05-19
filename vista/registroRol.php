<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreRol"]) &&
        isset($_POST["txtDescripcion"])) {

        $txtRol = validar_campo($_POST["txtNombreRol"]);
        $txtDescripcion = validar_campo($_POST["txtDescripcion"]);

        if(UsuarioControlador::registrarRol($txtRol, $txtDescripcion)) {
            header("location:rol.php");
        }
    }
} else {
    header("location:registro.php?error=1");
}



