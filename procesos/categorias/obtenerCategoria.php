<?php
require_once "../../clases/categorias.php";
$categorias = new Categorias();
echo json_encode($categorias->obtenerCategoria($_POST['idCategoria']));
?>