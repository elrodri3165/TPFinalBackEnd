<?php
session_start();

if (isset ($_SESSION['user'], $_GET['id_ventas'])){
    
    require '../config/config.php';
    require '../appdb/conexion.php';
    
    $id_ventas = $_GET['id_ventas'];
    
    $sql = "SELECT productos FROM ventas WHERE id_ventas = $id_ventas";
    $productos = mysqli_query($conexion, $sql);
    
    foreach ($productos as $producto){
        $array = explode(",", $producto['productos']);
    }
    
    
    foreach ($array as $row){
        if($row != ' '){
            $sql = "SELECT stock FROM productos WHERE id_producto = $row";
        
            $stock = mysqli_query($conexion, $sql);
        }
        
        
        foreach ($stock as $row2){
            $resultado_stock = $row2['stock'];
            $resultado_stock++;
            $sql = "UPDATE productos SET stock = '$resultado_stock' WHERE id_producto = $row";
            mysqli_query($conexion, $sql);
        }
    }
    
    $sql = "UPDATE ventas SET estado = 'RECHAZADA' WHERE id_ventas = $id_ventas";
    $resultado = mysqli_query($conexion, $sql);
    
header ('Location: ../login.php?resultado=modificadoook');
}
