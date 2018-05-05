<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 17:17
 */

include 'Conexion.php';
include '../entidades/Usuario.php';

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

        $query = "SELECT * FROM rrhh_db.usuario WHERE usuario = '$user' AND password = '$pass'"; 

        self::getConexion();

        // Preparamos y ejecutamos
        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true)) ;
        if($resultado) {
            $filas = sqlsrv_fetch_array($resultado);
                if ($filas["usuario"] == $user && $filas["password"] == $pass) {
                    return true;
                }
        } else {
            print_r("Error en la consulta: $query");
            return false;
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
        print_r($fechaAlta);
        $query = "INSERT INTO rrhh_db.usuario VALUES ('$user', '$pass','$fechaAlta', '$estado')";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $query) or die( print_r( sqlsrv_errors(), true)) ;

        if($resultado) {
            return true;
        }
        return false;
    }

}