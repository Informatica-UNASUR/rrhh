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
                    ASISTENCIAS
                </div>
                <div class="card-body">
                    <form action="subir_archivo.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Cargar archivo de asistencias</label>
                            <input type="file" class="form-control-file" name="archivo">
                        </div>
                        <button class="btn btn-outline-dark">Cargar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
