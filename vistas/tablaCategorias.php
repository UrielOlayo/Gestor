<?php
session_start();
require_once "../clases/conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT *FROM t_categoria WHERE id_usuario='$idUsuario'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                        $idCategoria = $mostrar['id_categoria'];

                    ?>
                        <tr>
                            <td><?php echo $mostrar['nombre']; ?></td>
                            <td><?php echo $mostrar['fechaInsert']; ?></td>
                            <td>
                                <span class="btn btn-warning btn-sm">
                                    <span class="fas fa-edit" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-toggle="modal" data-target="#modalActualizarCategoria"></span>
                                </span>
                            </td>
                            <td>
                                <span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
                                    <span class="fas fa-trash-alt"></span>
                                </span>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>