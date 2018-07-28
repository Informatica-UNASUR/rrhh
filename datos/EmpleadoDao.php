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
        $q = "SELECT idEmpleado, nombre, apellido, 
            ci, fechaNacimiento, sexo, telefono, direccion, email, numCuenta,
            nacionalidad, nombreConyuge, foto, estado, Horario_idHorario, 
            EstadoCivil_idEstadoCivil, Contrato_idContrato, fechaAsume, salarioFijo, idCargo, nombreCargo, idDepartamento, nombreDepartamento
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

    public static function obtenerEmpleado($idDepartamento) {
        $q = "select idEmpleado, idDepartamento,nombre, apellido, nombreDepartamento 
              from rrhh_db.empleado e
              inner join rrhh_db.empleadocargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              inner join rrhh_db.departamento d
              on ec.Departamento_idDepartamento=d.idDepartamento
              where idDepartamento = '$idDepartamento' and e.estado = 1
              order by nombre ASC";

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
              on e.idEmpleado=ec.Empleado_idEmpleado
              where e.estado = 1";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    public static function actualizarSalario($dato) {
        $idEmpleado = $dato->getIdEmppleado();
        $salario    = $dato->getSalario();

        $query = "update rrhh_db.empleadocargo set salarioFijo = '$salario' where Empleado_idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));


        if($resultado) {
            return $resultado;
        }

    }

    public static function eliminarEmpleado($dato) {
        $idEmpleado = $dato;

        $query = "update rrhh_db.empleado set estado = 0 where idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));


        if($resultado) {
            return $resultado;
        }

    }

    public static function agregarEmpleado($empleado) {
        $nombre = $empleado->getNombre();
        $apellido = $empleado->getApellido();
        $ci = $empleado->getCi();
        $fechaNac = $empleado->getFechaNacimiento();
        $sexo = $empleado->getSexo();
        $tel = $empleado->getTelefono();
        $dir = $empleado->getDireccion();
        $email = $empleado->getEmail();
        $cta = $empleado->getNumCuenta();
        $nac = $empleado->getNacionalidad();
        $horario = $empleado->getIdHorario();
        $civil = $empleado->getIdEstadoCivil();
        $contrato = $empleado->getIdContrato();
        $salario = $empleado->getSalario();
        $fechaAsume = $empleado->getFechaAsume();
        $cargo = $empleado->getCargoIdCargo();
        $dpto = $empleado->getDepartamentoIdDepartamento();

        $query = "{call sp_registrar_empleado(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
        $params = array(
            array($nombre, SQLSRV_PARAM_IN),
            array($apellido, SQLSRV_PARAM_IN),
            array($ci, SQLSRV_PARAM_IN),
            array($fechaNac, SQLSRV_PARAM_IN),
            array($sexo, SQLSRV_PARAM_IN),
            array($tel, SQLSRV_PARAM_IN),
            array($dir, SQLSRV_PARAM_IN),
            array($email, SQLSRV_PARAM_IN),
            array($cta, SQLSRV_PARAM_IN),
            array($nac, SQLSRV_PARAM_IN),
            array($horario, SQLSRV_PARAM_IN),
            array($civil, SQLSRV_PARAM_IN),
            array($contrato, SQLSRV_PARAM_IN),
            array($salario, SQLSRV_PARAM_IN),
            array($fechaAsume, SQLSRV_PARAM_IN),
            array($cargo, SQLSRV_PARAM_IN),
            array($dpto, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return $resultado;
        }
    }

    public static function editarEmpleado($empleado) {
        $txtIdEmpleado = $empleado->getIdEmppleado();
        $nombre = $empleado->getNombre();
        $apellido = $empleado->getApellido();
        $ci = $empleado->getCi();
        $sexo = $empleado->getSexo();
        $fechaNac = $empleado->getFechaNacimiento();
        $tel = $empleado->getTelefono();
        $dir = $empleado->getDireccion();
        $email = $empleado->getEmail();
        $cta = $empleado->getNumCuenta();
        $nac = $empleado->getNacionalidad();
        $horario = $empleado->getIdHorario();
        $estado = $empleado->getEstado();
        $civil = $empleado->getIdEstadoCivil();
        $contrato = $empleado->getIdContrato();
        $fechaAsume = $empleado->getFechaAsume();
        $dpto = $empleado->getDepartamentoIdDepartamento();
        $cargo = $empleado->getCargoIdCargo();

        $q0 = "update rrhh_db.empleadocargo set Departamento_idDepartamento = ('$dpto'),
               Cargo_idCargo = ('$cargo'), fechaAsume = '$fechaAsume'
               where Empleado_idEmpleado = ('$txtIdEmpleado')";

        $q = "UPDATE rrhh_db.empleado SET nombre = ('$nombre'), 
              apellido = ('$apellido'), ci = ('$ci'), sexo = '$sexo', fechaNacimiento = '$fechaNac', telefono = '$tel',
              direccion = '$dir', email = '$email', numCuenta = '$cta', nacionalidad = '$nac', Horario_idHorario = '$horario',
              estado = '$estado', EstadoCivil_idEstadoCivil = '$civil', Contrato_idContrato = '$contrato' 
              WHERE idEmpleado = ('$txtIdEmpleado') ";

        self::getConexion();
        $resultado0 = sqlsrv_query(self::$conexion, $q0) or die( print_r( sqlsrv_errors(), true));
        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }
}
