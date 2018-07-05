<?php
include 'Conexion.php';
include '../entidades/Auditoria.php';

class AuditoriaDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function mostrarAuditoria() {
        $q = "select * from rrhh_db.auditoria a
              join rrhh_db.detalleauditoria da
              on a.idAuditoria=da.Auditoria_idAuditoria
";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para mostrar usuarios
    public static function mostrarUsuarios() {
        self::desconectar();
        $q = "SELECT * FROM rrhh_db.usuario u 
              INNER JOIN rrhh_db.usuariorol ur 
              ON u.idUsuario=ur.Usuario_idUsuario
              INNER JOIN rrhh_db.rol r
              ON ur.Rol_idRol=r.idRol";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }

    // Metodo para mostrar usuarios
    public static function mostrarTablas() {
        self::desconectar();
        $q = "SELECT object_id, name 
              FROM sys.Tables 
              where name not in(
              'sysdiagrams', 
              'auditoria', 
              'detalleauditoria', 
              'usuariorol',
              'empleadocargo',
              'rolpermiso'
              )";

        self::getConexion();

        $resultado = sqlsrv_query(self::$conexion, $q) or die( print_r( sqlsrv_errors(), true));

        return $resultado;
    }
}