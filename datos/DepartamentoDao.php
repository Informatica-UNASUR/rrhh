<?php
include 'Conexion.php';
include '../entidades/Departamento.php';

class DepartamentoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarDepartamento($departamento) {
        $nombre      = $departamento->getNombreDepartamento();

        $query = "INSERT INTO rrhh_db.departamento VALUES ('$nombre')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    public static function editarDepartamento($departamento) {
        $idDepartamento     = $departamento->getIdDepartamento();
        $NombreDepartamento = $departamento->getNombreDepartamento();

        $query = "UPDATE rrhh_db.departamento SET nombreDepartamento = ('$NombreDepartamento') WHERE idDepartamento = ('$idDepartamento')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    // Metodo para mostrar departamentos
    public static function mostrarDepartamentos() {
        $q = "SELECT idDepartamento, nombreDepartamento FROM rrhh_db.departamento";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarDptos() {
        $q = "select DISTINCT idDepartamento, nombreDepartamento 
            from rrhh_db.empleado e
            inner join rrhh_db.empleadocargo ec
            on e.idEmpleado=ec.Empleado_idEmpleado
            inner join rrhh_db.departamento d
            on ec.Departamento_idDepartamento=d.idDepartamento
            where e.estado = 1";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para eliminar departamento
    public static function eliminarDepartamento($idDepartamento) {
        $q = "DELETE FROM rrhh_db.departamento WHERE idDepartamento = ('$idDepartamento')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    public static function existeDepartamento($nombreDepartamento) {
        $q = "SELECT nombreDepartamento FROM rrhh_db.departamento WHERE nombreDepartamento = ('$nombreDepartamento')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        if (sqlsrv_has_rows($resultado) != 1) {
            return false;
        } else {
            return true;
        }
    }
}
