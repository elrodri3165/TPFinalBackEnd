<?php
session_start();

if (isset ($_SESSION['user'], $_POST['id_producto'], $_POST['stock'])){
    
    require '../config/config.php';
    require '../appdb/conexion.php';
    
    $stock = $_POST['stock'];
    $id_producto = $_POST['id_producto'];
    
    $sql = "UPDATE productos SET stock = $stock WHERE id_producto = $id_producto";
    
    
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=modificadoook');
        die;
    }else{
        echo 'Ocurrio un error!';
    } 
    
}

header ('Location: ../index.php');