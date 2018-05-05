<?php
include '../datos/UsuarioDao.php';

class UsuarioControlador {
    // Empaqueta el usuario y password en objeto Usuario de entidad y lo envia a UsuarioDao para que valide
    public static function login($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        return UsuarioDao::login($obj_usuario); // Retorna true o false
    }

    public static function getUsuario($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        return UsuarioDao::getUsuario($obj_usuario);
    }

    public static function registrar($usuario, $password, $estado) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setEstado($estado);
        return UsuarioDao::registrar($obj_usuario);
    }
}
