<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreRol"]) && isset($_POST["txtDescripcion"])){

        $idRol = $_POST["txtIdRol"];
        $txtNombreRol = validar_campo($_POST["txtNombreRol"]);
        $txtDescripcion = $_POST["txtDescripcion"];

        if(UsuarioControlador::editarRol($idRol, $txtNombreRol, $txtDescripcion)) { // True/False
            header("location:rol_backup.php");
        }
    }
} else {
    header("location:registro.php?error=1");
}

