<?php
session_start();

if (isset ($_SESSION['user'], $_POST['id_ventas'], $_POST['estado'])){
    
    require '../config/config.php';
    require '../appdb/conexion.php';
    
    $estado = $_POST['estado'];
    $id_ventas = $_POST['id_ventas'];
    
    $sql = "UPDATE ventas SET estado = '$estado' WHERE id_ventas = $id_ventas";
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=modificadoook');
        die;
    }else{
        echo 'Ocurrio un error!';
    } 
    
}

header ('Location: ../index.php');