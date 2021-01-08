<?php
session_start();
if (isset($_SESSION['usuario'])) {
    include "header.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container text-center">
                        <h1 class="display-4">Bienvenido al Gestor de Archivos</h1>
                        <p class="lead">Gestor creado por Uriel Olayo Ramirez, Tutorial de como hacerlo en el siguiente Boton</p>
                        <p class="lead">
                            <a class="btn btn-info btn-lg" href="https://www.youtube.com/watch?v=UEgb-rpytwQ&list=PLoRfWwOOv4jyc4AGixmxVA3YLoQLraDDG" role="button">VER</a>
                        </p>
                    </div>
                    <img src="../img/fondo.jpg" alt="" width="700px" height="260px" class="rounded mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
<?php
    include "footer.php";
} else {
    header("location:../index.php");
}
?>