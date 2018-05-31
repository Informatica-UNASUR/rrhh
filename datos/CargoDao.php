<?php
include 'Conexion.php';
include '../entidades/Cargo.php';

class CargoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarCargo($cargo) {
        $nombre = $cargo->getNombreCargo();

        $query = "INSERT INTO rrhh_db.cargo VALUES ('$nombre')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarCargo($cargo) {
        $idCargo     = $cargo->getIdCargo();
        $NombreCargo = $cargo->getNombreCargo();

        $query = "UPDATE rrhh_db.cargo SET nombreCargo = ('$NombreCargo') WHERE idCargo = ('$idCargo')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar cargos
    public static function mostrarCargos() {
        $q = "SELECT * FROM rrhh_db.cargo";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para eliminar cargo
    public static function eliminarCargo($idCargo) {
        $q = "DELETE FROM rrhh_db.cargo WHERE idCargo = ('$idCargo')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }
}