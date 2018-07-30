<?php
include 'Conexion.php';
include '../entidades/Marcacion.php';

class AsistenciaDao extends Conexion
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

    public static function insertarMarcacion($marcacion)
    {
        $fecha = $marcacion->getFecha();
        $entrada = $marcacion->getEntrada();
        $salida = $marcacion->getSalida();
        $entrada2 = $marcacion->getEntrada2();
        $salida2 = $marcacion->getSalida2();
        $idEmpleado = $marcacion->getIdEmpleado();

        $query = "INSERT INTO rrhh_db.marcacion VALUES ('$fecha','$entrada','$salida','$entrada2','$salida2','$idEmpleado')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
    }

    // Metodo para mostrar deduccions
    /*public static function mostrarDevengos()
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
    }*/
}