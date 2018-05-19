<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreUsuario"]) && isset($_POST["txtEstado"])){

        $idUsuario = $_POST["txtIdUsuario"];
        $txtNombreUsuario = validar_campo($_POST["txtNombreUsuario"]);
        $txtEstado = $_POST["txtEstado"];

        if(UsuarioControlador::editarUsuario($idUsuario, $txtNombreUsuario, $txtEstado)) { // True/False
            header("location:user.php");
        }
    }
} else {
    header("location:registro.php?error=1");
}

