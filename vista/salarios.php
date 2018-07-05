<?php include 'partials/head.php'; ?>
<?php
include '../controlador/DepartamentoControlador.php';

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["Rol_idRol"] == 2) { // Si el rol del user es 2, redirige al index
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container" style="max-height: 100%">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    ADMINISTRAR SALARIOS
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">Departamento</label>
                        <div class="col-sm-3">
                            <select name="cbSexo" id="edit_sexo" class="custom-select">
                                <option value="" selected disabled>--Selecciona el departamento--</option>
                                <?php
                                $r = DepartamentoControlador::mostrarDepartamentos();
                                while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                    echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-sm-1 col-form-label">Empleado</label>
                        <div class="col-sm-3">
                            <select name="cbSexo" id="edit_sexo" class="custom-select">
                                <option value="" selected disabled>--Selecciona el empleado--</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input id="agregar" type="submit" class="btn btn-outline-dark col-lg-8" value="Filtrar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
