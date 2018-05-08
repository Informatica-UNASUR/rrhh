<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!--        <a class="navbar-brand" href="#">RRHH</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php if(!isset($_SESSION["usuario"])) { ?> <!-- Si no hay session -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin" >Login</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="d-md-down-none">Recursos Humanos</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="empleado.php"><i class="fa fa-users" aria-hidden="true"></i> Empleados</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-wpforms" aria-hidden="true"></i> Cargos</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Departamentos</a>
                            <a class="dropdown-item" href="#">Acción #1</a>
                            <a class="dropdown-item" href="#">Acción #2</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a id="empleado" class="nav-link" href="#">Asistencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pagos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <?php if($_SESSION["usuario"]["estado"] == 1) { ?> <!-- Si el user es admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Auditoria</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="d-md-down-none">Administración</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCrearUsuario"><i class="fa fa-user-plus"></i> Crear usuario</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCrearRol"><i class="fa fa-sitemap" aria-hidden="true"></i> Roles</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Privilegios</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Acción #2</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Acción #3</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="d-md-down-none"><i class="fa fa-user-circle-o fa-lg"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i><?php echo " ".$_SESSION["usuario"]["usuario"]; ?></a>
                                <a class="dropdown-item" href="#"><i class="fa fa-key"></i> Actualizar contraseña</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar-sesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                            </div>
                        </li>
                    <?php } else { ?>  <!-- Si el user es user standar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="d-md-down-none"><i class="fa fa-user-circle-o fa-lg"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i><?php echo $_SESSION["usuario"]["usuario"]; ?></a>
                                <a class="dropdown-item" href="#"><i class="fa fa-key"></i> Actualizar contraseña</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar-sesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                            </div>
                        </li>
                    <?php }}?>
            </ul>
        </div>
    </div>
</nav>