<?php
include '../controlador/AuditoriaControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
$resultado = AuditoriaControlador::mostrarAuditoria();

$json = array();

do {
    while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
        $json["data"][] = $row;
    }
} while (sqlsrv_next_result($resultado));

echo json_encode($json);

sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}
