<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 16:37
 */
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

//session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
     if(isset($_POST["txtUsuario"]) &&
        isset($_POST["txtPassword"]) &&
        isset($_POST["txtEstado"])) {

         $txtUsuario = validar_campo($_POST["txtUsuario"]);
         $txtPassword = validar_campo($_POST["txtPassword"]);
         $txtEstado = validar_campo($_POST["txtEstado"]);

        if(UsuarioControlador::registrar($txtUsuario, $txtPassword, $txtEstado)) {
            header("location:user.php");
        }
    }
} else {
    header("location:index.php");
}



