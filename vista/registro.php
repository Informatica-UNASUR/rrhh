<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>

<!-- Page Content -->
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="registroCode.php" method="POST" role="form">
                            <legend>Registro de usuario</legend>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
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
    </div>
</div>
<?php include 'partials/footer.php'; ?>

