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
                    REALIZAR PAGO
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">Departamento</label>
                        <div class="col-sm-2">
                            <select name="cbSexo" id="edit_sexo" class="custom-select">
                                <option value="" selected disabled>--Selecciona--</option>
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                        <label class="col-sm-1 col-form-label">Empleado</label>
                        <div class="col-sm-2">
                            <select name="cbSexo" id="edit_sexo" class="custom-select">
                                <option value="" selected disabled>--Selecciona--</option>
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                        <label class="col-sm-1 col-form-label">Periodo</label>
                        <div class="col-sm-2">
                            <input type="month" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="button" class="btn btn-outline-dark" value="PAGAR SALARIO">
                    </div>
                </div>
                <!--                --><?php //include("modal/agregarEmpleado.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarEmpleados.php'?>
    </div>
</div>


<?php include("modal/editarEmpleados.php");?>
<?php include 'partials/footer.php'; ?>
