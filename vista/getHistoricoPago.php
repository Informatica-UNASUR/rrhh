<?php
include '../controlador/NominaControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
$idEmpleado = $_POST['idEmpleado'];
$resultado = NominaControlador::mostrarHistoricoPagos($idEmpleado);

$json = array();
$flag = false;

do {
    while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
        $json["data"][] = $row;
        $flag = true;
    }
} while (sqlsrv_next_result($resultado));

if ($flag === false) {
    echo json_encode('no data');
} else {
    echo json_encode($json);
}

sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}