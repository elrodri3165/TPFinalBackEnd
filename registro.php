<?php

require 'appdb/conexion.php';

$dni = $_POST['dni'];
$password = $_POST['password'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$rol = 2;



$query = "INSERT INTO users (dni, apellido, nombre, password, email, id_rol, activo) VALUES ('$dni', '$apellido', '$nombre', '$password', '$email', $rol ,1)";

$resultado = mysqli_query($conexion, $query);


if ($resultado != null){
    header ('Location: index.php');
}else{
    header ('Location: index.php?error');
}