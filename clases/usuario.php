<?php
require_once "conexion.php";
class Usuario extends Conectar
{
    public function agregarUsuario($datos)
    {
        $conexion = Conectar::conexion();

        if (self::buscarUsurioRepetido($datos['usuario'])) {
            return 2;
        } else {
            $sql = "INSERT INTO usuarios (nombre,fechaNacimiento,email,usuario,password) VALUES (?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            /**hacemos una consulta preparada y mandamos a traer el nombre de los indices que estan
             * en el arreglo del archivo agregarUsuario.php
             **/
            //sssss = strings
            $query->bind_param('sssss', $datos['nombre'], $datos['fechaNacimiento'], $datos['correo'], $datos['usuario'], $datos['password']);
            $exito = $query->execute();
            $query->Close();
            return $exito;
        }
    }
    public function buscarUsurioRepetido($usuario)
    {
        $conexion = Conectar::conexion();
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);
        if ($datos['usuario'] != "" || $datos['usuario'] == $usuario) {
            return 1;
        } else {
            return 0;
        }
    }
    public function login($usuario, $password)
    {
        $conexion = Conectar::conexion();
        $sql = "SELECT count(*) as existeUsuario FROM usuarios WHERE usuario ='$usuario' AND password='$password'";
        $result = mysqli_query($conexion, $sql);
        $respuesta = mysqli_fetch_array($result)['existeUsuario'];

        if ($respuesta > 0) {
            $_SESSION['usuario'] = $usuario;
            $sql = "SELECT id_usuario FROM usuarios WHERE usuario ='$usuario' AND password='$password'";
            $result = mysqli_query($conexion, $sql);
            $idUsuario = mysqli_fetch_row($result)[0];
            $_SESSION['idUsuario'] = $idUsuario;
            return 1;
        } else {
            return 0;
        }
    }
}
