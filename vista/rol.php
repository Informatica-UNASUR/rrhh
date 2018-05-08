<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>


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
                        <label for="usuario">Rol</label>
                        <input type="text" name="txtUsuario" id="usuario" class="form-control" required placeholder="Ingrese su usuario...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="txtPassword" id="password" class="form-control" required placeholder="Ingrese su contraseña...">
                    </div>
                    <label for="password">Estado</label>
                    <div class="input-group">
                        <select class="custom-select" name="txtEstado" id="estado">
                            <option selected>Selecciona</option>
                            <option value="1">Activado</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>

