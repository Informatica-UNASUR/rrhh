<?php
include '../controlador/UsuarioControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreUsuario"]) && isset($_POST["txtIdUsuario"])){

        $idUsuario = $_POST["txtIdUsuario"];
        echo "hola";

        /*if(UsuarioControlador::eliminarUsuario($idUsuario)) {
            header("location:user.php");
        } else {
        	header("location:index.php");
        }*/
    }
} else {
    header("location:index.php");
}