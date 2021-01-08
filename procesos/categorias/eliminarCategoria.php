<?php
session_start();
require_once "../../clases/categorias.php";
$categorias = new Categorias();
echo $categorias->eliminarCategoria($_POST['idCategoria']);
?>