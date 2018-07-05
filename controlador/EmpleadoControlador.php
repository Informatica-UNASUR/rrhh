<?php
include '../datos/EmpleadoDao.php';

class EmpleadoControlador
{
    public static function mostrarEmpleados()
    {
        return EmpleadoDao::mostrarEmpleados();
    }

    public static function mostrarHorarios()
    {
        return EmpleadoDao::mostrarHorarios();
    }

    public static function mostrarEstadoCivil()
    {
        return EmpleadoDao::mostrarEstadoCivil();
    }

    public static function mostrarContratos()
    {
        return EmpleadoDao::mostrarContratos();
    }

    public static function mostrarDepartamentos() {
        return EmpleadoDao::mostrarDepartamentos();
    }

    public static function mostrarCargos() {
        return EmpleadoDao::mostrarCargos();
    }

    public static function mostrarSalarios() {
        return EmpleadoDao::mostrarSalarios();
    }

    public static function editarEmpleado($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail)
    {
        return EmpleadoDao::editarEmpleado($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail);
    }
}
