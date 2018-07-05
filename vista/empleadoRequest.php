<?php
include '../controlador/EmpleadoControlador.php';
include '../helps/helps.php';

$opcion = $_POST["opcion"];
$txtNombreEmpleado = $_POST["txtNombre"];
$txtApellidoEmpleado = $_POST["txtApellido"];
$txtCi = $_POST["txtCi"];
$txtEmail = $_POST["txtEmail"];
$informacion = [];

if($opcion != 'registrar') {
    $txtIdEmpleado = $_POST["txtIdUsuario"];
} else {
    $txtIdEmpleado = "0";
}

switch ($opcion) {
    case 'registrar':
        $existe = existeDepartamento($txtNombreDepartamento);
        if ($existe) {
            $informacion["respuesta"] = "EXISTE";
            echo json_encode($informacion);
        } else {
            agregar($txtNombreEmpleado);
        }
        break;
    case 'modificar':
        modificar($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail);
        break;
    case 'eliminar':
        eliminar($txtIdEmpleado);
        break;
    default:
        $informacion["respuesta"] = "OPCION VACIA";
        echo json_encode($informacion);
        break;
}

function existeDepartamento($txtNombreEmpleado) {
    $resultado = DepartamentoControlador::existeDepartamento($txtNombreEmpleado);
    return $resultado;
}

function agregar($txtNombreEmpleado) {
    $resultado = DepartamentoControlador::registrarDepartamento($txtNombreEmpleado);
    verificar_resultado($resultado);
}

function modificar($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail) {
    $resultado = EmpleadoControlador::editarEmpleado($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $txtEmail);

    verificar_resultado($resultado);
}

function eliminar($txtIdEmpleado) {
    $resultado = DepartamentoControlador::eliminarDepartamento($txtIdEmpleado);
    verificar_resultado($resultado);
}

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}



