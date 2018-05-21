<?php
include 'Conexion.php';
include '../entidades/Usuario.php';
include '../entidades/Rol.php';
include '../entidades/Departamento.php';

class UsuarioDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    // Metodo que sirve para validar el login, recibe un objeto usuario como parametro
    public static function login($usuario) {
        $user = $usuario->getUsuario(); // Obtenemos el nombre del user
        $pass = $usuario->getPassword(); // Obtenemos el password del user

        $query = "SELECT * FROM rrhh_db.usuario WHERE usuario = ? AND password = ?";

        $params = array(
            array($user, SQLSRV_PARAM_IN),
            array($pass, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        // Preparamos y ejecutamos
        $resultado = sqlsrv_query(self::$conexion, $query, $params);// or die( print_r( sqlsrv_errors(), true)) ;

        if($resultado === false) {
            die(print_r(sqlsrv_errors(), true));
            return false;
        }

        if(sqlsrv_has_rows($resultado) != 1) {
            print_r("Usuario y password no encontrados + [$resultado]");
            return false;
        } else {
            $filas = sqlsrv_fetch_array($resultado);
            if ($filas["usuario"] == $user && $filas["password"] == $pass) {
                return true;
            }
        }
        return false;
    }

    // Metodo que obtiene un usuario
    public static function getUsuario($usuario) {
        $user = $usuario->getUsuario(); // Obtenemos el nombre del user
        $pass = $usuario->getPassword(); // Obtenemos el password del user

        $query = "{call login_usuario(?,?)}";
        $params = array(
            array($user, SQLSRV_PARAM_IN),
            array($pass, SQLSRV_PARAM_IN)
        );
        self::getConexion();
        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true)) ;

        if($resultado) {
            $filas = sqlsrv_fetch_array($resultado);
            $usuario = new Usuario();
            $usuario->setIdUsuario($filas["idUsuario"]);
            $usuario->setUsuario($filas["usuario"]);
            $usuario->setFechaAlta($filas["fechaAlta"]);
            $usuario->setEstado($filas["estado"]);

            return $usuario;
        } else {
            print_r("Error en la consulta: $query");
            return false;
        }
    }

    public static function registrar($usuario) {
        $user   = $usuario->getUsuario();
        $pass   = $usuario->getPassword();
        $estado = $usuario->getEstado();
        $fechaAlta = date("d")."-".date("m")."-".date("Y");
        $query = "INSERT INTO rrhh_db.usuario VALUES ('$user', '$pass','$fechaAlta', '$estado')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true)) ;

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function registrarRol($rol) {
        $nombre      = $rol->getNombre();
        $descripcion = $rol->getDescripcion();

        $query = "INSERT INTO rrhh_db.rol VALUES ('$nombre', '$descripcion')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function registrarDepartamento($departamento) {
        $nombre      = $departamento->getNombreDepartamento();

        $query = "INSERT INTO rrhh_db.departamento VALUES ('$nombre')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarDepartamento($departamento) {
        $idDepartamento     = $departamento->getIdDepartamento();
        $NombreDepartamento = $departamento->getNombreDepartamento();

        $query = "UPDATE rrhh_db.departamento SET nombreDepartamento = ('$NombreDepartamento') WHERE idDepartamento = ('$idDepartamento')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarRol($rol) {
        $idRol       = $rol->getIdRol();
        $nombreRol   = $rol->getNombre();
        $descripcion = $rol->getDescripcion();

        $query = "UPDATE rrhh_db.rol SET nombre = ('$nombreRol'), descripcion = ('$descripcion') WHERE idRol = ('$idRol')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarUsuario($usuario) {
        $idUsuario       = $usuario->getIdUsuario();
        $nombreUsuario   = $usuario->getUsuario();
        $estado          = $usuario->getEstado();

        $query = "UPDATE rrhh_db.usuario SET usuario = ('$nombreUsuario'), estado = ('$estado') WHERE idUsuario = ('$idUsuario')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar usuarios
    public static function mostrarUsuarios() {
        $q = "SELECT * FROM rrhh_db.usuario";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para eliminar usuario
    public static function eliminarUsuario($idUsuario) {
        $q = "DELETE FROM rrhh_db.usuario WHERE idUsuario = ('$idUsuario')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }
}
