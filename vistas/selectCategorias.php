<?php
session_start();
require_once "../clases/conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];

$sql = "SELECT id_categoria,nombre FROM t_categoria WHERE id_usuario= '$idUsuario'";
$resul = mysqli_query($conexion, $sql);
?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php
    while ($mostrar = mysqli_fetch_array($resul)) {
        $idCategoria = $mostrar['id_categoria'];

    ?>
        <option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>

    <?php

    }
    ?>
</select>