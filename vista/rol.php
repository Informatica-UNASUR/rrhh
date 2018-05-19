<?php include 'partials/head.php'; ?>
<?php
include ('../datos/Conexion.php');

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["estado"] == 0) { // Si el estado del user es 0, muestra todo lo de abajo
        header("location:index.php");
    }

} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    LISTADO DE ROLES
                    <a href="#agregarRolModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar roles</a>
                </div>

                <div class="row col-sm-12">
                    <div class="col" style="padding-top: 9px; padding-left: 418px">
                        <div class="input-group">
                            <input class="form-control border-secondary py-md-1" type="search" placeholder="Buscar...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-hover table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del rol</th>
                            <th>Descripción</th>
                            <th class="text-right">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $c = new Conexion();
                        $c = $c->conectar();

                        $q = "SELECT * FROM rrhh_db.rol";
                        $r = sqlsrv_query($c, $q) or die( print_r( sqlsrv_errors(), true));

                        while ($row = sqlsrv_fetch_array($r) ) {
                            echo '
                            <tr>
                                <td>'.$row["idRol"].'</td>
                                <td>'.$row["nombre"].'</td>                  
                                <td>'.$row["descripcion"].'</td>                  
                                <td class="text-right">                                    
                                <a href="#">
									    <i class="material-icons" data-toggle="tooltip" title="Editar" style="color: #FFC107;">edit</i>
								</a>&nbsp;
								<a href="#">
									<i class="material-icons" data-toggle="tooltip" title="Eliminar" style="color: #F44336;">delete</i>
								</a>
                                    
                                </td>
                            <tr/>
                        ';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'modal/agregarRol.php'?>
<?php include 'partials/footer.php'; ?>
