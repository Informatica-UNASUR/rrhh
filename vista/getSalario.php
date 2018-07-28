<?php
include '../controlador/NominaControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST["cbEmpleado"];
    $periodo = $_POST["periodo"];
    $periodo = $periodo.'-01';
    $resultado = NominaControlador::mostrarNomina($idEmpleado, $periodo);
    $json = array();

    do {
        while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
//            $json["data"][] = $row;
            $json = $row;
        }
    } while (sqlsrv_next_result($resultado));

    echo json_encode($json);

    sqlsrv_free_stmt( $resultado);
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
    $idEmpleado = $_GET["idEmpleado"];
    $resultado = NominaControlador::mostrarSalario($idEmpleado);
    $json = array();

    do {
        while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
//            $json["data"][] = $row;
            $json = $row;
        }
    } while (sqlsrv_next_result($resultado));

    echo json_encode($json);

    sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}