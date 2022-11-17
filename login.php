<?php
session_start();
/*si encuentro algo en la session usuario y si el rol es adminstrador dejo ingresar al panel.
sino redireccio a index con error en sin permisos*/
if (isset ($_SESSION['user']) && $_SESSION['rol'] == 1){ ?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container">

        <?php require 'templates/nav_login.php'; ?>

        <?php require 'appdb/conexion.php'; ?>

        <?php require 'templates/notificacion.php'; ?>
        
        <h3 class="bg-dark text-white m-0 mt-3 p-2">Categorias</h3>
        <table class="table table-striped mb-3 border">
            <thead class="table-dark">
                <tr>
                    <th>ID_categoria</th>
                    <th>Nombre</th>
                    <th>Observaciones</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
        $sql = "SELECT * FROM categorias WHERE activo = 1";

        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
            <tr>
                <td><?php echo $fila['id_categoria'];?> </td>
                <td><?php echo $fila['categoria'];?> </td>
                <td><?php echo $fila['observaciones'];?> </td>
                <td><a class="btn btn-primary" href="form_agregar_categoria.php?id_categoria=<?php echo $fila['id_categoria'];?>" role="button">Modificar</a></td>
                <td><a class="btn btn-danger" href="crud/eliminar.php?id_categoria=<?php echo $fila['id_categoria'];?>" role="button">Borrar</a></td>
            </tr>
            <?php } } ?>
        </table>
        
        <hr>
        
        <h3 class="bg-dark text-white m-0 mt-3 p-2">Productos</h3>
        <table class="table table-striped mb-3 border">
            <thead class="table-dark">
                <tr>
                    <th>ID_producto</th>
                    <th>ID_categoria</th>
                    <th>Nombre</th>
                    <th>Observaciones</th>
                    <th>Foto</th>
                    <th>Stock</th>
                    <th>Destacado</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
        $sql = "SELECT * FROM productos WHERE activo = 1";

        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
            <tr>
                <td><?php echo $fila['id_producto'];?> </td>
                <td><?php echo $fila['id_categoria'];?> </td>
                <td><?php echo $fila['nombre'];?> </td>
                <td><?php echo $fila['observaciones'];?> </td>
                <td><img src="data:image/png;base64, <?php echo base64_encode($fila['foto']);?>" alt="" width="100px" height="100px"> </td>
                <td><?php echo $fila['stock'];?> </td>
                <td><?php
                        if($fila['destacado'] == 1){
                            echo 'SI';
                        }else{
                            echo 'NO';
                        }
                    ?> </td>
                <td><a class="btn btn-primary" href="form_agregar_producto.php?id_producto=<?php echo $fila['id_producto'];?>" role="button">Modificar</a></td>
                <td><a class="btn btn-danger" href="crud/eliminar.php?id_producto=<?php echo $fila['id_producto'];?>" role="button">Borrar</a></td>
            </tr>
            <?php } } ?>
        </table>
        
    </div>
</body>

</html>


<?php 
}else{
    header ('Location: index.php?error=sinpermisos');
}
