<?php
session_start();
require_once "../clases/conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];

$sql = "SELECT a.id_archivo AS idArchivo,b.nombre AS nombreUsuario, c.nombre AS categoria, 
a.nombre AS nombreArchivo, 
a.tipo AS tipoArchivo, 
a.ruta AS rutaArchivo, 
a.fecha AS fechaArchivo
FROM t_archivos a, usuarios b, t_categorias c where (b.id_usuario=a.id_usuario) and (c.id_categoria=a.id_categoria) and (a.id_usuario='$idUsuario')";


?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark" id="tablaGestorDataTable">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Extensión de archivo</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');
                    $resultado = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {

                        $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                    ?>
                        <tr>
                            <td align="center"><?php echo $mostrar['categoria'] ?></td>
                            <td align="center"><?php echo $mostrar['nombreArchivo'] ?></td>
                            <td align="center"><?php echo $mostrar['tipoArchivo'] ?></td>
                            <td align="center">
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                    <span class="fas fa-download"></span>
                                </a>
                            </td>
                            <td align="center">
                                <?php
                                for ($i = 0; $i < count($extensionesValidas); $i++) {
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                                ?>
                                        <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                            <span class="fas fa-eye"></span>
                                        </span>
                                <?php

                                    }
                                }
                                ?>
                            </td>
                            <td align="center">
                                <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
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
        $('#tablaGestorDataTable').DataTable();
    });
</script>