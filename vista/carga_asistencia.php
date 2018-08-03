<?php include 'partials/head.php'; ?>
<?php
include '../controlador/EmpleadoControlador.php';

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
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            CONSULTAR MARCACIONES
                        </div>
                        <div class="card-body">
                            <form id="marcaciones">
                                <button type="submit" class="btn btn-outline-dark"><i class="fa fa-search">&nbsp;VER</i></button>
                            </form>
                            <!--                    &nbsp;<hr>-->
                            <div id="cardPago" class="card-body" style="display: none"> <!-- hidden -->
                                <div class="form-group-sm row">
                                    <div class="col-sm-12">
                                        <div id="cardHistoricoPagos" class="card">
                                            <div id="cheader" class="card-header" style="background-color: white">
                                                MARCACIONES
                                                <a id="pdfHistoricoPago" class="btn float-right border-0"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="card-body">
                                                <table id="dtMarcaciones" class="table table-sm table-hover" style="width:100%">
                                                      <thead>
                                                       <tr>
                                                            <th>Fecha</th>
                                                            <th>Empleado</th>
                                                            <th>Hora de Entrada</th>
                                                            <th>Hora de Salida</th>
                                                            <th>Entrada 2</th>
                                                            <th>Salida 2</th>
                                                        </tr>
                                                      </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
