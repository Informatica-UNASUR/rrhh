<?php
include '../controlador/UsuarioControlador.php';

$r = UsuarioControlador::mostrarRoles();

echo '<option value="0">Seleccionar rol</option>';
while(($fila = sqlsrv_fetch_array($r)) != NULL) {
    echo '<option value="'.$fila["idRol"].'">'.$fila["nombre"].'</option>';
}
/*
sqlsrv_free_stmt();
sqlsrv_close();
*/