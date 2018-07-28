<?php
include '../controlador/DevengoControlador.php';

$opcion = $_POST["opcion"];
if($opcion == 'registrarDevengo') {
    $nombreDevengo = $_POST["txtNombreDevengo"];
    $resultado = DevengoControlador::registrarDevengo($nombreDevengo);
    verificar_resultado($resultado);
} else if($opcion == 'agregarDevengo') {
    $idEmpleado = $_POST["idEmpleado"];
    $tipoDevengo = $_POST["cbDevengo"];
    $montoDevengo = str_replace('.', '', $_POST["montoDevengo"]);
    $fechaDevengo = $_POST["fechaDevengo"];
    $obsDevengo = $_POST["obsDevengo"];

    $resultado = DevengoControlador::agregarDevengo($idEmpleado, $tipoDevengo, $montoDevengo, $fechaDevengo, $obsDevengo);
    verificar_resultado($resultado);
}

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}
