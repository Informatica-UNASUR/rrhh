<?php
include '../controlador/DevengoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = DevengoControlador::mostrarDevengos();
        while (($fila = sqlsrv_fetch_array($resultado)) != NULL) {
            echo '<option value="' . $fila['idTipoDevengo'] . '">' . $fila['TipoDevengo'] . '</option>';
        }
} else {
    header("location:index.php");
}
