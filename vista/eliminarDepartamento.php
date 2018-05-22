<?php
include '../controlador/DepartamentoControlador.php';

header('Content-type:application/json;charset=utf-8');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreDepartamento"]) && isset($_POST["txtIdDepartamento"])){

        $idDepartamento = $_POST["txtIdDepartamento"];

        $resultado = array("valor" => "true");

        if(DepartamentoControlador::eliminarDepartamento($idDepartamento)) {
            return print(json_encode($resultado));
            header("location:departamento.php");
        } else {
        	header("location:index.php");
        }
    }
} else {
    header("location:index.php");
}

$resultado = array("valor" => "false");
return print(json_encode($resultado));