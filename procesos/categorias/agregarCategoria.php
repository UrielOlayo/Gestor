<?php
session_start();
require_once "../../clases/categorias.php";
$categorias = new Categorias();
$datos = array(
    "idUsuario" => $_SESSION['idUsuario'],
    "categoria" => $_POST['categoria']
);
echo $categorias->agregarCatergoria($datos);
