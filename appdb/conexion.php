<?php

include_once 'config/config.php';

$conexion = mysqli_connect($servidor, $usuario, $clave, $base);

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}