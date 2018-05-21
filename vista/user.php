<?php include 'partials/head.php'; ?>
<?php
include '../controlador/UsuarioControlador.php';

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["estado"] == 0) { // Si el estado del user es 1, muestra todo lo de abajo
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    LISTADO DE USUARIOS
                    <a href="#agregarUsuarioModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar usuario</a>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-hover table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del usuario</th>
                            <th>Fecha de alta</th>
                            <th>Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $r = UsuarioControlador::mostrarUsuarios();

                        while ($row = sqlsrv_fetch_array($r) ) {
                            $idUsuario = $row['idUsuario'];
                            $nombre = $row['usuario'];
                            $fechaAlta = $row['fechaAlta'];
                            $estado = $row['estado'];
                            $estado == 1 ? $activo = true : $activo = false;
                            ?>
                            <tr>
                                <td>&nbsp;&nbsp;<?php echo $idUsuario; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $fechaAlta; ?></td>
                                <?php if($estado) {?>
                                    <td><span class="badge badge-success"><?php echo "Activo"; ?></span></td>
                                <?php } else {?>
                                    <td><span class="badge badge-secondary"><?php echo "Inactivo"; ?></span></td>
                                <?php }?>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#editarUsuarioModal"
                                       data-id="<?php echo $idUsuario ?>"
                                       data-name="<?php echo $nombre ?>"
                                       data-fecha="<?php echo $fechaAlta ?>"
                                       data-estado="<?php echo $estado ?>">
                                        <i class="material-icons" data-toggle="tooltip" title="Editar" style="color: #FFC107;">edit</i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#eliminarUsuarioModal"
                                       data-id="<?php echo $idUsuario ?>"
                                       data-name="<?php echo $nombre ?>">
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
    <?php include 'modal/eliminarUsuario.php'?>
</div>

<?php include 'modal/agregarUsuario.php'?>
<?php include 'modal/editarUsuario.php'?>
<?php include 'partials/footer.php'; ?>
