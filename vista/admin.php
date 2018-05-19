<?php include 'partials/head.php'; ?>
<?php

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["estado"] == 0) {
        header("location:index.php");
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
                    <p>Email: <strong><?php echo $_SESSION["usuario"]["usuario"].'@rrhh.com'; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'modal/agregarUsuario.php'?>
<?php include 'modal/agregarRol.php'?>
<?php include 'partials/footer.php'; ?>
