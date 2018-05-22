<?php
include '../controlador/DepartamentoControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreDepartamento"])){

        $txtNombreDepartamento = validar_campo($_POST["txtNombreDepartamento"]);

        if(DepartamentoControlador::registrarDepartamento($txtNombreDepartamento)) {
            header("location:departamento.php");
        }
    }
} else {
    header("location:index.php");
}



