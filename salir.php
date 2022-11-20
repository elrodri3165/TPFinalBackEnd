<?php

session_start();
$_SESSION['user'] = null;
$_SESSION['user'] = null;
$_SESSION['email'] = null;
$_SESSION['apellido'] = null;
$_SESSION['nombre'] = null;
$_SESSION['rol'] = null;

header ('Location: index.php');