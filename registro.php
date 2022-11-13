<?php

require 'appdb/conexion.php';

$dni = $_POST['dni'];
$password = $_POST['password'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];



$query = "INSERT INTO users (dni, apellido, nombre, password, email, activo) VALUES ('$dni', '$apellido', '$nombre', '$password', '$email', 1)";

$resultado = mysqli_query($conexion, $query);


if ($resultado != null){
    header ('Location: index.php');
}else{
    header ('Location: index.php?error');
}