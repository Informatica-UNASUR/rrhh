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

    public static function registrar($usuario, $password, $estado, $idRol) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setEstado($estado);
        $obj_usuario->setIdRol($idRol);
        return UsuarioDao::registrar($obj_usuario);
    }

    public static function editarUsuario($idUsuario, $nombreUsuario, $estado, $idRol) {
        $obj_Rol = new Usuario();
        $obj_Rol->setIdUsuario($idUsuario);
        $obj_Rol->setUsuario($nombreUsuario);
        $obj_Rol->setEstado($estado);
        $obj_Rol->setIdRol($idRol);
        return UsuarioDao::editarUsuario($obj_Rol);
    }

    public static function registrarRol($nombreRol, $descripcion) {
        $obj_Rol = new Rol();
        $obj_Rol->setNombre($nombreRol);
        $obj_Rol->setDescripcion($descripcion);
        return UsuarioDao::registrarRol($obj_Rol);
    }

    public static function editarRol($idRol, $nombreRol, $descripcion) {
        $obj_Rol = new Rol();
        $obj_Rol->setIdRol($idRol);
        $obj_Rol->setNombre($nombreRol);
        $obj_Rol->setDescripcion($descripcion);
        return UsuarioDao::editarRol($obj_Rol);
    }


    public static function registrarDepartamento($nombreDepartamento) {
        $obj_Departamento = new Departamento();
        $obj_Departamento->setNombreDepartamento($nombreDepartamento);
        return UsuarioDao::registrarDepartamento($obj_Departamento);
    }

    public static function editarDepartamento($idDepartamento, $nombreDepartamento) {
        $obj_Departamento = new Departamento();
        $obj_Departamento->setIdDepartamento($idDepartamento);
        $obj_Departamento->setNombreDepartamento($nombreDepartamento);
        return UsuarioDao::editarDepartamento($obj_Departamento);
    }

    // Mostrar usuarios
    public static function mostrarUsuarios() {
        return UsuarioDao::mostrarUsuarios();
    }

    // Mostrar roles
    public static function mostrarRoles() {
        return UsuarioDao::mostrarRoles();
    }

    public static function eliminarUsuario($idUsuario) {
        return UsuarioDao::eliminarUsuario($idUsuario);
    }
}
