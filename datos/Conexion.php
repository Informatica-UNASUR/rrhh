<?php
class Conexion {
    // Metodo estatico para realizar la conexion
    public static function conectar() {
        // Evaluamos la conexion
        try {
            // Variable de conexion
            $cn = sqlsrv_connect("SERGIOHP\SQLEXPRESS", array('Database'=>"rrhh_db_dev", 'CharacterSet'=>'UTF-8', 'ReturnDatesAsStrings'=>true));
//              $cn = sqlsrv_connect("ROOT", array('Database'=>"rrhh_db_dev", 'UID'=>"jose_paredes", 'PWD'=>"j053", 'CharacterSet'=>'UTF-8', 'ReturnDatesAsStrings'=>true));
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