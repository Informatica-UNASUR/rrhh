<?php
include 'Conexion.php';
include '../entidades/Empleado.php';

class EmpleadoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function mostrarEmpleados() {
//        $q = "SELECT idEmpleado, nombre, apellido, ci, fechaNacimiento, sexo,
//              telefono, direccion, email, numCuenta,
//              nacionalidad, nombreConyuge, foto, estado,
//              Horario_idHorario, EstadoCivil_idEstadoCivil, Contrato_idContrato
//              FROM rrhh_db.empleado";

        $q = "SELECT idEmpleado, nombre, apellido, 
            ci, fechaNacimiento, sexo, telefono, direccion, email, numCuenta,
            nacionalidad, nombreConyuge, foto, estado, Horario_idHorario, 
            EstadoCivil_idEstadoCivil, Contrato_idContrato, fechaAsume, nombreCargo, idDepartamento, nombreDepartamento
            FROM rrhh_db.empleado e
            inner join rrhh_db.empleadocargo ec
            on e.idEmpleado=ec.Empleado_idEmpleado
            inner join rrhh_db.cargo c
            on ec.Cargo_idCargo=c.idCargo
            inner join rrhh_db.departamento d
            on ec.Departamento_idDepartamento=d.idDepartamento";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarHorarios() {
        $q = "select * from rrhh_db.horario";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarEstadoCivil() {
        $q = "select * from rrhh_db.estadoCivil";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarContratos() {
        $q = "select * from rrhh_db.contrato";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarDepartamentos() {
        $q = "SELECT idDepartamento, nombreDepartamento FROM rrhh_db.departamento";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarCargos() {
        $q = "SELECT * FROM rrhh_db.cargo";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function mostrarSalarios() {
        $q = "select idEmpleado, ci, nombre, apellido, salarioFijo, tipoContrato
              from rrhh_db.empleado e
              join rrhh_db.contrato c
              on e.Contrato_idContrato=c.idContrato
              join rrhh_db.empleadocargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function editarEmpleado($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail) {
        $q = "UPDATE rrhh_db.empleado SET nombre = ('$txtNombreEmpleado'), apellido = ('$txtApellidoEmpleado'), ci = ('$txtCi'), email = ('$txtEmail') WHERE idEmpleado = ('$txtIdEmpleado') ";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }
}