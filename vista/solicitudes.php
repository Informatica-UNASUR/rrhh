<?php include 'partials/head.php'; ?>
<?php

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["Rol_idRol"] == 2) {
        header("location:usuario.php");
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
                <h1><strong>Página <u>Solicitudes</u> en construcción</strong></h1>
                <div>
                    <p>Estamos mejorando para usted <strong><?php echo $_SESSION["usuario"]["usuario"]; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
