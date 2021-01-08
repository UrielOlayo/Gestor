<?php
require_once "../../../clases/usuario.php";
//print_r($_POST);
$pasword = sha1($_POST['password']); //encriptamos el password con sha1
$fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
$fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
$datos = array(
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $fechaNacimiento,
    "correo" => $_POST['correo'],
    "usuario" => $_POST['usuario'],
    "password" => $pasword
);
$usuario = new usuario(); //instanciamos la clase usuario
echo $usuario->agregarUsuario($datos);
