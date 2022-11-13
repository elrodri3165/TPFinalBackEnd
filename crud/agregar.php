<?php

if (isset ($_POST['id_categoria'], $_POST['categoria'], $_POST['observaciones'])){
    
    $id_categoria = $_POST['id_categoria'];
    $categoria = $_POST['categoria'];
    $observaciones = $_POST['observaciones'];
    
    
    if ($_POST['id_categoria'] != null){
        $sql = "UPDATE categorias SET categoria = '$categoria', observaciones = '$observaciones' WHERE id_categoria = $id_categoria ";
    }else{
        $sql = "INSERT INTO categorias (categoria, observaciones, activo) VALUES ('$categoria', '$observaciones', 1)";
        echo $sql;
    }
    
    require '../config/config.php';
    require '../appdb/conexion.php';

    
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=ok');
    }else{
        echo 'Ocurrio un error!';
    }
}

if (isset ($_POST['id_producto'], $_POST['id_categoria'], $_POST['nombre'], $_POST['observaciones'], $_POST['stock'], $_POST['precio'])){
    
    $id_producto = $_POST['id_producto'];
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $observaciones = $_POST['observaciones'];
    //$foto = $_POST['foto'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    if (isset ($_POST['destacado'])){
        $destacado = '1';
    }else{
        $destacado = '0';
    }
    if (isset ($_POST['activo'])){
        $activo = '1';
    }else{
        $activo = '0';
    }
    
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    
    if ($_POST['id_producto'] != null){
        $sql = "UPDATE productos SET id_categoria = '$id_categoria', nombre = '$nombre', observaciones = '$observaciones', foto = '$imagen', stock = '$stock', precio = '$precio', destacado = '$destacado' WHERE id_producto = $id_producto ";
    }else{
        $sql = "INSERT INTO productos (id_categoria, nombre, observaciones, foto, stock, precio, destacado, activo) VALUES ('$id_categoria', '$nombre', '$observaciones', '$imagen', '$stock', '$precio', '$destacado', 1)";
    }
    
    require '../config/config.php';
    require '../appdb/conexion.php';

    
    $resultado = mysqli_query($conexion, $sql);
    
    var_dump($resultado);
    
    if ($resultado != null){
        header ('Location: ../login.php?resultado=ok');
    }else{
        echo 'Ocurrio un error!';
    }
}



else{
    header ('Location: ../index.php');
}