<?php
include '../controlador/DeduccionControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = DeduccionControlador::mostrarDeducciones();
    while (($fila = sqlsrv_fetch_array($resultado)) != NULL) {
        echo '<option value="' . $fila['idTipoDeduccion'] . '">' . $fila['tipoDeduccion'] . '</option>';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idEmpleado = $_GET["idEmpleado"];
    $resultado = DeduccionControlador::mostrarDeduccionesP($idEmpleado);

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
