<?php include 'partials/head.php'; ?>
<?php
include ('../datos/Conexion.php');

if (isset($_SESSION["usuario"])) {

} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    LISTADO DE DEPARTAMENTOS
                    <a href="#agregarDepartamentoModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar departamento</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-hover table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del departamento</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $c = new Conexion();
                        $c = $c->conectar();

                        $q = "SELECT * FROM rrhh_db.departamento";
                        $r = sqlsrv_query($c, $q) or die( print_r( sqlsrv_errors(), true));

                        while ($row = sqlsrv_fetch_array($r) ) {
                            $idDepartamento = $row['idDepartamento'];
                            $nombreDepartamento = $row['nombreDepartamento'];
                        ?>
                <tr>            
                     <td><?php echo $idDepartamento;?></td>
                     <td><?php echo $nombreDepartamento; ?></td>
               <td>                                    
                    <a href="#" data-toggle="modal" data-target="#editarDepartamentoModal" 
                      data-id="<?php echo $idDepartamento; ?>"
                      data-name="<?php echo $nombreDepartamento;?>">
                        <i class="material-icons" data-toggle="tooltip" title="Editar" style="color: #FFC107;">edit</i>
                    </a>
                    <a href="#">
                        <i class="material-icons" data-toggle="tooltip" title="Eliminar" style="color: #F44336;">delete</i>
                    </a>                                    
                </td>
                </tr>
                       <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php include("modal/agregarDepartamento.php");?>
            </div>
        </div>
    </div>
</div>

<?php include("modal/editarDepartamento.php");?>
<?php include 'partials/footer.php'; ?>
