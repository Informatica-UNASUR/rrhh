<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 16:37
 */
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

//header('Content-type: application/json');
header('Content-type:application/json;charset=utf-8');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") { // Validar que el metodo de envio sea POST
    if(!empty($_POST["txtUsuario"]) && !empty($_POST["txtPassword"])) {

        $txtUsuario = validar_campo($_POST["txtUsuario"]);
        $txtPassword = validar_campo($_POST["txtPassword"]);

        $resultado = array("valor" => "true");

        if(UsuarioControlador::login($txtUsuario, $txtPassword)) { // Si el user existe
            //print_r("\nEntro en el if\n");
            $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);

            $_SESSION["usuario"] = array(
                      "idUsuario" => $usuario->getIdUsuario(),
                      "usuario"   => $usuario->getUsuario(),
                      "fechaAlta" => $usuario->getFechaAlta(),
                      "estado"    => $usuario->getEstado()
            );
            //print_r($_SESSION["usuario"]);
            return print(json_encode($resultado));
        }
        // Si no existe
        //print_r ("\nNO entro en el if\n");
    }
}

$resultado = array("valor" => "false");
return print(json_encode($resultado));


