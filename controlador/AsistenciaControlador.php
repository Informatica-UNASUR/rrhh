<?php
include '../datos/AsistenciaDao.php';

class AsistenciaControlador {

    public static function cargarAsistencia($fecha, $entrada, $salida, $entrada2, $salida2, $idempleado) {
        $obj_marcacion = new Marcacion();
        $obj_marcacion->setFecha($fecha);
        $obj_marcacion->setEntrada($entrada);
        $obj_marcacion->setSalida($salida);
        $obj_marcacion->setEntrada2($entrada2);
        $obj_marcacion->setSalida2($salida2);
        $obj_marcacion->setIdEmpleado($idempleado);
        return AsistenciaDao::insertarMarcacion($obj_marcacion);
    }

    public static function mostrarMarcaciones() {
        return AsistenciaDao::mostrarMarcaciones();
    }

    // Mostrar departamentos
/*    public static function mostrarDevengos() {
        return DevengoDao::mostrarDevengos();
    }

    public static function eliminarCargo($idCargo) {
        return CargoDao::eliminarCargo($idCargo);
    }*/
}