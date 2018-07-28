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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    LISTADO DE EMPLEADOS
                    <a href="#agregarEmpleadoModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar empleado</a>
                </div>
                <div class="card-body">
                    <table id="dtEmpleado" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Funcionario</th>
<!--                            <th>CI</th>-->
                            <th>Departamento</th>
                            <th>Cargo</th>
                            <th class="text-center">Estado</th>
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
    <?php include 'modal/agregarEmpleado.php'?>
</div>


<?php include("modal/editarEmpleados.php");?>
<?php include 'partials/footer.php'; ?>
