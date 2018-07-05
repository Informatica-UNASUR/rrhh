<?php include 'partials/head.php'; ?>
<?php
include '../controlador/EmpleadoControlador.php';

if (isset($_SESSION["usuario"])) {

} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    LISTADO DE SALARIOS
                </div>
                <div class="card-body">
                    <table id="dtSalario" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Funcionario</th>
                            <th>Salario bruto</th>
                            <th>Contrato</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <!--                --><?php //include("modal/agregarEmpleado.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarEmpleados.php'?>
    </div>
</div>


<?php include("modal/editarEmpleados.php");?>
<?php include 'partials/footer.php'; ?>
