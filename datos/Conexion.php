<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 16:53
 */
class Conexion {
    // Metodo estatico para realizar la conexion
    public static function conectar() {
        // Evaluamos la conexion
        try {
            // Variable de conexion
            $cn = sqlsrv_connect("ROOT", array('Database'=>"rrhh_db_dev", 'UID'=>"sa", 'PWD'=>"j053", 'CharacterSet'=>'UTF-8'));
            /*if($cn)
                echo "Conexion ok";
            else
                echo "Sin conexion";*/
            return $cn;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}

//$c = new Conexion();
//$c->conectar();