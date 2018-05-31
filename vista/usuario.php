<?php include 'partials/head.php'; ?>
<?php

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["Rol_idRol"] == 1) { // Si el rol del user es 1(rol administrador), redirige
        header("location:admin.php");
    }
} else {
    header("location:index.php");
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
                    <p>Email: <strong><?php echo $_SESSION["usuario"]["usuario"].'@rrhh.com'; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
