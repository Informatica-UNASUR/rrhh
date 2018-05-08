<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreRol"]) &&
        isset($_POST["txtDescripcion"])) {

        $txtRol = validar_campo($_POST["txtNombreRol"]);
        $txtDescripcion = validar_campo($_POST["txtDescripcion"]);

        if(UsuarioControlador::registrarRol($txtRol, $txtDescripcion)) {

//            $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
//            $_SESSION["usuario"] = array(
//                "idUsuario" =>$usuario->getIdUsuario(),
//                "usuario"   =>$usuario->getUsuario(),
//                "estado"    =>$usuario->getEstado(),
//            );
            header("location:admin.php");
        }
    }
} else {
    header("location:registro.php?error=1");
}



