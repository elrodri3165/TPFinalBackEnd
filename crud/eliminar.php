<?php
session_start();

if (isset ($_SESSION['user'], $_GET['id_categoria'])){
    
    $id_categoria = $_GET['id_categoria'];
    
    require '../config/config.php';
    require '../appdb/conexion.php';
    
    $sql = "DELETE FROM categorias WHERE id_categoria = $id_categoria";
    
    
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=borradook');
        die;
    }else{
        echo 'Ocurrio un error!';
    } 
}

if (isset ($_SESSION['user'], $_GET['id_producto'])){
    $id_producto = $_GET['id_producto'];
    
    require '../config/config.php';
    require '../appdb/conexion.php';
    
    $sql = "DELETE FROM productos WHERE id_producto = $id_producto";
    
    
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=borradook');
        die;
    }else{
        echo 'Ocurrio un error!';
    } 
}


else{
    header ('Location: ../index.php');
}