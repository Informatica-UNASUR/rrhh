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

        $query = "SELECT * FROM rrhh_db.usuario WHERE usuario = ?";

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
            if ($filas["usuario"] == $user && password_verify($pass, $filas["password"])) {
                return true;
            }
        }
        return false;
    }

    // Metodo que obtiene un usuario
    public static function getUsuario($usuario) {
        $user = $usuario->getUsuario(); // Obtenemos el nombre del user
        $pass = $usuario->getPassword(); // Obtenemos el password del user

        $query = "{call login_usuario(?)}";
        $params = array(
            array($user, SQLSRV_PARAM_IN)
        );
        self::getConexion();
        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die(print_r(sqlsrv_errors(), true));

        if($resultado === false) {
            die(print_r(sqlsrv_errors(), true));
            return false;
        }

        if (sqlsrv_has_rows($resultado) != 1) {
            print_r("Usuario y password no encontrados");
            return false;
        } else {
            $filas = sqlsrv_fetch_array($resultado);
            if ($filas["usuario"] == $user && password_verify($pass, $filas["password"])) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($filas["idUsuario"]);
                $usuario->setUsuario($filas["usuario"]);
                $usuario->setFechaAlta($filas["fechaAlta"]);
                $usuario->setEstado($filas["estado"]);
                $usuario->setIdRol($filas["Rol_idRol"]);

                return $usuario;
            } else {
                print_r("Error en la consulta: $query");
                return false;
            }
            return false;
        }
    }

    public static function registrar($usuario) {
//        date_default_timezone_set("America/Asuncion");
        $user   = $usuario->getUsuario();
        $pass   = $usuario->getPassword();
        $estado = $usuario->getEstado();
        $idRol = $usuario->getIdRol();
        $query = "{call sp_registrar_usuario(?,?,?,?)}";
        $params = array(array($user, SQLSRV_PARAM_IN),
                        array($pass, SQLSRV_PARAM_IN),
                        array($estado, SQLSRV_PARAM_IN),
                        array($idRol, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true)) ;

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
        $idRol           = $usuario->getIdRol();

//        $query = "UPDATE rrhh_db.usuario SET usuario = ('$nombreUsuario'), estado = ('$estado') WHERE idUsuario = ('$idUsuario')";

        $query = "{call sp_actualizar_usuario(?,?,?,?)}";
        $params = array(array($idUsuario, SQLSRV_PARAM_IN),
            array($nombreUsuario, SQLSRV_PARAM_IN),
            array($estado, SQLSRV_PARAM_IN),
            array($idRol, SQLSRV_PARAM_IN)
        );

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query, $params) or die( print_r( sqlsrv_errors(), true));

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar usuarios
    public static function mostrarUsuarios() {
        $q = "SELECT * FROM rrhh_db.usuario u 
              INNER JOIN rrhh_db.usuariorol ur 
              ON u.idUsuario=ur.Usuario_idUsuario
              INNER JOIN rrhh_db.rol r
              ON ur.Rol_idRol=r.idRol";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para mostrar roles
    public static function mostrarRoles() {
        $q = "SELECT * FROM rrhh_db.rol";

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
