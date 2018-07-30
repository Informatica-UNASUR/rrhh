<?php
include 'Conexion.php';
include '../entidades/Nomina.php';

class NominaDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarNomina($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $dias            = $nomina->getDiasTrabajados();
        $fecha           = $nomina->getFechaPago();
        $periodo         = $nomina->getPeriodoPago();
        $salario         = $nomina->getSalario();
        $totalPercibido  = $nomina->getTotalPago();
        $totalDeduccion  = $nomina->getTotalDeduccion();
        $totalDevengo    = $nomina->getTotalDevengo();

        $query = "insert into rrhh_db.nominapago values (
                  '$idEmpleado', '$dias', '$fecha', '$periodo','$totalDeduccion', '$totalDevengo','$salario', '$totalPercibido')";
        /*
        $query = "{call sp_registrar_nomina(?,?,?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($dias, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN),
            array($totalPercibido, SQLSRV_PARAM_IN)
        );
        */

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function mostrarNomina($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "{call sp_mostrar_nomina(?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function reporteSalario($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "{call sp_reporte_salario(?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        $empleado = array();
        do {
            while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (sqlsrv_next_result($resultado));

        return $empleado;
    }

    public static function reporteDeduccion($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "{call sp_reporte_deduccion(?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        $empleado = array();
        do {
            while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (sqlsrv_next_result($resultado));

        return $empleado;
    }

    public static function reporteDevengo($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "{call sp_reporte_devengo(?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        $empleado = array();
        do {
            while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (sqlsrv_next_result($resultado));

        return $empleado;
    }

    public static function mostrarHistoricoPagos($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();

        $query = "select Empleado_idEmpleado, fechaPago, periodoPago, Salario,
                  totalDeduccion, totalDevengo, totalPercibido from rrhh_db.nominapago where Empleado_idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function mostrarSalario($empleado) {
        $idEmpleado      = $empleado->getEmpleadoIdEmpleado();

        $query = "select top 1 salarioFijo Salario from rrhh_db.empleadocargo where Empleado_idEmpleado = '$idEmpleado' order by Empleado_idEmpleado desc";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
        //return false;
    }
}