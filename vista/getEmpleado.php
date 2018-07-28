<?php
include '../controlador/EmpleadoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['idDpto'])) {
        $idDpto = $_POST['idDpto'];
        $resultado = EmpleadoControlador::obtenerEmpleado($idDpto);

        while(($fila = sqlsrv_fetch_array($resultado)) != NULL) {
            echo '<option value="'.$fila['idEmpleado'].'">'.$fila['nombre'].' '.$fila['apellido'].'</option>';
        }
    } else {
        $resultado = EmpleadoControlador::mostrarEmpleados();

        $json = array();

        do {
            while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                $json["data"][] = $row;
            }
        } while (sqlsrv_next_result($resultado));

        echo json_encode($json);

        sqlsrv_free_stmt($resultado);
    }
} else {
    header("location:index.php");
}
