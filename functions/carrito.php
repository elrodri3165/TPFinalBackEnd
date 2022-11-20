<?php

function Volver(){
    header ("Location: verproductos.php");
}


if (!isset ($_SESSION['carrito'])){
    CrearCarrito();
}


function CrearCarrito(){
    $_SESSION['carrito'] = [
        'cantidad_productos' => 0 ,
        'productos' => [
              
        ]
    ];
}

if (isset($_GET['agregar'], $_GET['id_producto'])){
    $id_producto = $_GET['id_producto'];
    
    array_push($_SESSION['carrito']['productos'], $id_producto);
    $_SESSION['carrito']['cantidad_productos']++;
    Volver();
}

if (isset($_GET['vaciar'])){
    CrearCarrito();
    Volver();
}