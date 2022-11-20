<?php
session_start();
require 'appdb/conexion.php';


if(isset($_SESSION['user'], $_SESSION['carrito'], $_POST['direccion'], $_POST['codigo_postal'], $_POST['metodo-pago'])){
    $user = $_SESSION['id_user'];
    $carrito = $_SESSION['carrito'];
    $direccion = $_POST['direccion'].'('.$_POST['codigo_postal'].')';
    $metodo_pago = $_POST['metodo-pago'];
    
    $productos = null;
    
    foreach ($_SESSION['carrito']['productos'] as $row){
        $sql = "SELECT stock FROM productos WHERE id_producto = $row";
        $stock = mysqli_query($conexion, $sql);
        
        foreach ($stock as $row2){
            $resultado_stock = $row2['stock'];
            $resultado_stock--;
            $sql = "UPDATE productos SET stock = '$resultado_stock' WHERE id_producto = $row";
            mysqli_query($conexion, $sql);
        }
        $productos .= $row.', ';
    }
    
    $sql = "INSERT INTO ventas (id_user, productos, direccion, metodo_pago, estado) VALUES ($user, '$productos', '$direccion', '$metodo_pago', 'PENDIENTE-PAGO')";
    
    
    $resultado = mysqli_query($conexion, $sql);
    
    if($resultado != null){
        $_SESSION['carrito'] = null;
        header ('Location: index.php');
        die;
    }
    
}

header ('Location: index.php');