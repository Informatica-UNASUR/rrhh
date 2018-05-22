<?php
include '../controlador/DepartamentoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreDepartamento"]) && isset($_POST["txtIdDepartamento"])){

        $idDepartamento = $_POST["txtIdDepartamento"];

        if(DepartamentoControlador::eliminarDepartamento($idDepartamento)) {
            header("location:departamento.php");
        } else {
        	header("location:index.php");
        }
    }
} else {
    header("location:index.php");
}