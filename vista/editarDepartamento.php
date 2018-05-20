<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreDepartamento"])){

        $txtNombreDepartamento = validar_campo($_POST["txtNombreDepartamento"]);
        $txtIdDepartamento = $_POST["txtIdDepartamento"];

        if(UsuarioControlador::editarDepartamento($txtIdDepartamento, $txtNombreDepartamento)) { // Resulota
            header("location:departamento.php");
        }
    }
} else {
//    header("location:index.php?error=1");
    header("location:index.php");
}



