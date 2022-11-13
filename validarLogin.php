<?php
session_start();
require 'appdb/conexion.php';

$dni  = $_POST['dni'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE dni = '$dni' AND password = '$password' AND activo = 1";

$resultado = mysqli_query($conexion, $query);

foreach ($resultado as $row){
    
    if ($dni == $row['dni'] && $password == $row ['password']){
        $_SESSION['user'] = $row['dni'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['nombre'] = $row['nombre'];
        header ('Location: login.php');
        die;
    }
    
}

header ('Location: index.php?error');
