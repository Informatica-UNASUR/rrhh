<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">RRHH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php if(!isset($_SESSION["usuario"])) { ?> <!-- Si no hay session -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                <?php } else { ?>
                <?php if($_SESSION["usuario"]["estado"] == 1) { ?> <!-- Si el user es admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">PanelAdministración</a>
                    </li>
                    <?php } else { ?>                                  <!-- Si el user es user standar -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">PanelUsuario</a>
                        </li>
                <?php } }?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin" >Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>