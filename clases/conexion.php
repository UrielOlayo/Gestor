<?php
class Conectar
{
    public function conexion()
    {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $DB = "gestor";

        $conexion = mysqli_connect($servidor, $usuario, $password, $DB);
        $conexion->set_charset('utf8mb4');
        return $conexion;
    }
}
