<?php
session_start();
require_once "../../clases/categorias.php";
$categorias = new Categorias();
$datos = array(
    "idCategoria" => $_POST['idCategoria'],
    "categoria" => $_POST['categoriaU']
);
echo $categorias->actualizarCategoria($datos);
