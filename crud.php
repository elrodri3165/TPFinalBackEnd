<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container">

        <?php require 'templates/nav.php'; ?>
        
        <?php require 'appdb/conexion.php'; ?>
        
        <?php require 'templates/notificacion.php'; ?>

        <a class="btn btn-primary" href="form_agregar_prenda.php" role="button">Agregar prenda</a>
        
        <table class="table table-striped my-3">
           <thead class="table-dark">
               <tr>
                   <th>Tipo de prenda</th>
                   <th>Marca</th>
                   <th>Talle</th>
                   <th>Precio</th>
                   <th>Modificar</th>
                   <th>Eliminar</th>
               </tr>
           </thead>
            <?php
        $sql = "SELECT * FROM ropa";

        $resultado = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_array($resultado)){ ?>
            <tr>
                <td><?php echo $fila['tipo_de_prenda'];?> </td>
                <td><?php echo $fila['marca'];?> </td>
                <td><?php echo $fila['talle'];?> </td>
                <td><?php echo $fila['precio'];?> </td>
                <td><a class="btn btn-primary" href="form_agregar_prenda.php?id_ropa=<?php echo $fila['id_ropa'];?>" role="button">Modificar</a></td>
                <td><a class="btn btn-danger" href="crud/eliminar.php?id_ropa=<?php echo $fila['id_ropa'];?>" role="button">Borar</a></td>
            </tr>
            <?php } ?>
        </table>
        
    </div>
</body>
</html>