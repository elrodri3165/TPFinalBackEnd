<?php
session_start();
require 'appdb/conexion.php';

   if (isset ($_GET['id_producto'])){
    
    $id_producto = $_GET['id_producto'];    
    $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
    
    $resultado = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_array($resultado);
    
    if ($array != null){
        $id_categoria = $array['id_categoria'];
        $nombre = $array['nombre'];
        $observaciones = $array['observaciones'];
        $foto = $array['foto'];
        $stock = $array['stock'];
        $precio = $array['precio'];
        if($array['destacado'] == 1){
            $destacado = 'checked';
        }else{
            $destacado = 'null';
        }
        if($array['activo'] == 1){
            $activo = 'checked';
        }else{
            $activo = 'null';
        }
        
        $boton = 'Modificar';
    }
}else{
    $id_producto = null;
    $id_categoria = null;
    $nombre = null;
    $observaciones = null;
    $foto = null;
    $stock = null;
    $precio = null;
    $destacado = null;
    $activo = null;
       
    $boton = 'Agregar';
}
?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container">

        <?php require 'templates/nav_login.php'; ?>

        <main>
            <form method="post" action="crud/agregar.php" enctype="multipart/form-data">

                <input name="id_producto" type="hidden" value="<?php echo $id_producto ?>">

                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Id_categoria</label>
                    <select name="id_categoria" type="text" class="form-control" id="id_categoria" aria-describedby="Id_categoria" required>
                        
                        <option value="">Por favor seleccione una categoria</option>

                        <?php
                        $sql = "SELECT * FROM categorias WHERE activo = 1";
    
                        $resultado = mysqli_query($conexion, $sql);
                        
                        foreach ($resultado as $row){ ?>

                        <option value="<?php echo $row['id_categoria'] ?>"><?php echo $row['categoria'] ?></option>

                        <?php    
                        }
                       ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="Nombre" required value="<?php echo $nombre ?>">
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input name="observaciones" type="text" class="form-control" id="observaciones" aria-describedby="Observaciones" value="<?php echo $observaciones ?>">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input name="foto" type="file" class="form-control" id="foto" aria-describedby="Foto" required value="">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" class="form-control" id="stock" aria-describedby="Stock" required value="<?php echo $stock ?>">
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="number" class="form-control" id="precio" aria-describedby="Precio" required value="<?php echo $precio ?>">
                </div>

                <div class="form-check form-switch">
                    <input name="destacado" class="form-check-input" type="checkbox" role="switch" id="destacado" <?php echo $destacado ?>>
                    <label class="form-check-label" for="destacado">Seleccione si es un producto destado</label>
                    <p>* Los productos destacados salen en el carrusel</p>
                </div>
                
                <div class="form-check form-switch">
                    <input name="activo" class="form-check-input" type="checkbox" role="switch" id="activo" <?php echo $activo ?>>
                    <label class="form-check-label" for="activo">Seleccione si es un producto activo para la venta</label>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo $boton ?></button>
                <a class="btn btn-secondary" href="login.php" role="button">Volver</a>

            </form>
        </main>


    </div>
</body>

</html>
