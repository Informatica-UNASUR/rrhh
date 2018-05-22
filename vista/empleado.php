<?php include 'partials/head.php'; ?>
<?php
include ('../datos/Conexion.php');

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
                    <table id="dtDefault" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Funcionario</th>
                            <th>CI</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //            $c = sqlsrv_connect("ROOT", array('Database'=>"rrhh_db_dev", 'UID'=>"sa", 'PWD'=>"j053", 'CharacterSet'=>'UTF-8'));
                        $c = new Conexion();
                        $c = $c->conectar();

                        $q = "SELECT * FROM rrhh_db.empleado";
                        $r = sqlsrv_query($c, $q) or die( print_r( sqlsrv_errors(), true));

                        while ($row = sqlsrv_fetch_array($r) ) {
                            $activo = false;
                            $idEmpleado = $row['idEmpleado'];
                            $funcionario = $row['nombre']." ".$row['apellido'];
                            $ci = $row['ci'];
                            $direccion = $row['direccion'];
                            $email = $row['email'];
                            $estado = $row['estado'];
                            if ($estado == 1) $activo = true;
                            ?>
                            <tr>
                                <td>&nbsp;&nbsp;<?php echo $idEmpleado; ?></td>
                                <td><?php echo $funcionario; ?></td>
                                <td><?php echo $ci; ?></td>
                                <td><?php echo $direccion; ?></td>
                                <td><?php echo $email; ?></td>
                                <?php if($estado) {?>
                                    <td class="text-center"><span class="badge badge-success"><?php echo "Activo"; ?></span></td>
                                <?php } else {?>
                                    <td class="text-center"><span class="badge badge-secondary"><?php echo "Inactivo"; ?></span></td>
                                <?php }?>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#editarUsuarioModal"
                                       data-id="<?php echo $idEmpleado ?>"
                                       data-name="<?php echo $funcionario ?>"
                                       data-ci="<?php echo $ci ?>"
                                       data-direccion="<?php echo $direccion ?>"
                                       data-email="<?php echo $email ?>"
                                       data-estado="<?php echo $estado ?>">
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
            </div>
        </div>
    </div>
</div>

<?php include("modal/agregarEmpleado.php");?>
<?php include 'partials/footer.php'; ?>

