<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>

<!-- Page Content -->
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center">Sistema de gestión de recursos humanos</h1>
            </div>
        </div>

        <!-- Modal Login -->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLoginTitle">Acceso al sistema</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" id="login" action="validarCode.php" method="POST" role="form">
                            <label for="usuario" class="sr-only">Usuario</label>
                            <input type="text" name="txtUsuario" id="usuario" class="form-control font-italic" placeholder="Usuario" required autofocus>
                            <label for="inputPassword" class="sr-only">Contrasena</label>
                            <input type="password" name="txtPassword" id="password" class="mt-0 form-control font-italic" placeholder="Contraseña" required>

                            <div class="checkbox mb-2">
                                <label>
                                    <input type="checkbox" value="remember-me"> Recordar contraseña
                                </label>
                            </div>
                            <button class="btn btn-outline-primary btn-block" type="submit">Ingresar</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'partials/footer.php'; ?>
