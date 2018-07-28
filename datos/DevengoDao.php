<?php
include 'Conexion.php';
include '../entidades/Devengo.php';

class DevengoDao extends Conexion
{
    protected static $conexion;

    private static function getConexion()
    {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$conexion = null;
    }

    public static function registrarDevengo($devengo) {
        $nombre = $devengo->getTipoDevengo();

        $query = "INSERT INTO rrhh_db.tipodevengo VALUES ('$nombre')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die(print_r(sqlsrv_errors(), true));

        if ($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function agregarDevengo($devengo)
    {
        $idEmpleado = $devengo->getEmpleadoIdEmpleado();
        $idDevengo = $devengo->getTipoDevengoIdDevengo();
        $montoDevengo = $devengo->getMontoDevengo();
        $fechaDevengo = $devengo->getFechaDevengo();
        $obsDevengo = $devengo->getObservacion();

        $query = "{call sp_agregar_devengo(?,?,?,?,?)}";

        $params = array(array($idEmpleado, SQLSRV_PARAM_IN),
            array($idDevengo, SQLSRV_PARAM_IN),
            array($montoDevengo, SQLSRV_PARAM_IN),
            array($fechaDevengo, SQLSRV_PARAM_IN),
            array($obsDevengo, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die(print_r(sqlsrv_errors(), true));

        if ($resultado) {
            return $resultado;
        }
        //return false;
    }

    // Metodo para mostrar deduccions
    public static function mostrarDevengos()
    {
        $q = "SELECT * FROM rrhh_db.tipodevengo";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die(print_r(sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarDevengoesP()
    {
//        $q = "SELECT * FROM rrhh_db.tipodeduccion";
        $q = "select * from rrhh_db.empleado e
              inner join rrhh_db.deduccion d
              on e.idEmpleado=d.Empleado_idEmpleado
              inner join rrhh_db.tipodeduccion td
              on d.TipoDevengo_idTipoDevengo=td.idTipoDevengo";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die(print_r(sqlsrv_errors(), true));

        return $resultado;
    }

}