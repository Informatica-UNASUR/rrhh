<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreRol"]) && isset($_POST["txtDescripcion"])){

        $idRol = $_POST["txtIdRol"];
        $txtNombreRol = validar_campo($_POST["txtNombreRol"]);
        $txtDescripcion = $_POST["txtDescripcion"];

        if(UsuarioControlador::editarRol($idRol, $txtNombreRol, $txtDescripcion)) { // True/False
            header("location:rol.php");
        }
    }
} else {
    header("location:index.php");
}

