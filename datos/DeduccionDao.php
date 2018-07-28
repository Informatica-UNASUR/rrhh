<?php
include 'Conexion.php';
include '../entidades/Deduccion.php';

class DeduccionDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarDeduccion($deduccion) {
        $nombre = $deduccion->getTipoDeduccion();

        $query = "INSERT INTO rrhh_db.tipodeduccion VALUES ('$nombre')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function agregarDeduccion($deduccion) {
        $idEmpleado = $deduccion->getEmpleadoIdEmpleado();
        $idDeduccion = $deduccion->getTipoDeduccionIdDeduccion();
        $montoDeduccion = $deduccion->getMontoDeduccion();
        $fechaDeduccion = $deduccion->getFechaDeduccion();
        $obsDeduccion = $deduccion->getObservacion();

        //$query = "INSERT INTO rrhh_db.deduccion VALUES ('$idEmpleado', '$idDeduccion', '$montoDeduccion', '$fechaDeduccion', '$obsDeduccion')";
        $query = "{call sp_agregar_deduccion(?,?,?,?,?)}";

        $params = array(array($idEmpleado, SQLSRV_PARAM_IN),
            array($idDeduccion, SQLSRV_PARAM_IN),
            array($montoDeduccion, SQLSRV_PARAM_IN),
            array($fechaDeduccion, SQLSRV_PARAM_IN),
            array($obsDeduccion, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function editarDeduccion($deduccion) {
        $idDeduccion     = $deduccion->getIdDeduccion();
        $NombreDeduccion = $deduccion->getNombreDeduccion();

        $query = "UPDATE rrhh_db.deduccion SET nombreDeduccion = ('$NombreDeduccion') WHERE idDeduccion = ('$idDeduccion')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar deduccions
    public static function mostrarDeducciones() {
        $q = "SELECT * FROM rrhh_db.tipodeduccion";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarDeduccionesP($idEmpleado) {
//        $q = "SELECT * FROM rrhh_db.tipodeduccion";
        $q = "select * from rrhh_db.empleado e
              inner join rrhh_db.deduccion d
              on e.idEmpleado=d.Empleado_idEmpleado
              inner join rrhh_db.tipodeduccion td
              on d.TipoDeduccion_idTipoDeduccion=td.idTipoDeduccion
              where idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para eliminar deduccion
    public static function eliminarDeduccion($idDeduccion) {
        $q = "DELETE FROM rrhh_db.deduccion WHERE idDeduccion = ('$idDeduccion')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }
}