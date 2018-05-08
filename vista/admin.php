<?php include 'partials/head.php'; ?>
<?php

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["estado"] == 0) {
        header("location:usuario.php");
    }
} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php'; ?>

<!-- Page Content -->
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <div class="jumbotron">
            <div class="container text-center">
                <h1><strong>Bienvenido</strong>  <?php echo $_SESSION["usuario"]["usuario"];?></h1>
                <div>
                    <p>Estado: <strong><?php echo $_SESSION["usuario"] ["estado"] == 1 ?
                                $_SESSION["usuario"] ["estado"] : $_SESSION["usuario"] ["estado"]; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCrearUsuario">Registro de usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevoUsuario" action="registroCode.php" method="POST" role="form">
                    <div class="form-group col-lg-12">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="txtUsuario" id="usuario" class="form-control" required placeholder="Ingrese su usuario...">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="password">Password</label>
                        <input type="password" name="txtPassword" id="password" class="form-control" required placeholder="Ingrese su contraseña...">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="estado">Estado</label>
                        <select class="custom-select" name="txtEstado" id="estado">
                            <option selected value="1">Activado</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="rol">Rol</label>
                        <select class="custom-select" name="txtRol" id="rol">
                            <option selected>Seleccione el rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                    <div class="form-group form-check">
                        <label for="rol">Privilegios</label>
                        <div class="form-inline">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox104">
                                <label for="checkbox104" class="form-check-label">INSERT</label>
                            </div> &nbsp;  &nbsp;  &nbsp;
                            <div class="form-check">
                                <input type="checkbox" class="filled-in form-check-input" id="checkbox105">
                                <label for="checkbox105" class="form-check-label">UPDATE</label>
                            </div> &nbsp;  &nbsp;  &nbsp;
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox106">
                                <label for="checkbox106" class="form-check-label">DELETE</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-lg btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalCrearRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearRol" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCrearRol">Registro de roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevoRol" action="registroRol.php" method="POST" role="form">
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <input type="text" name="txtNombreRol" id="nombreRol" class="form-control" required placeholder="Ingrese el nombre del rol">
                    </div>
                    <div class="form-group">
                        <label for="password">Descripcion</label>
                        <input type="text" name="txtDescripcion" id="descripcion" class="form-control" required placeholder="Ingrese la descripcion...">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-dark btn-lg btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
