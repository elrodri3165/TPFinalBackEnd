<?php
session_start();
require 'appdb/conexion.php';

   if (isset ($_GET['id_categoria'])){
    
    $id_categoria = $_GET['id_categoria'];    
    $sql = "SELECT * FROM categorias WHERE id_categoria = $id_categoria";
    
    $resultado = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_array($resultado);
    
    if ($array != null){
        $id_categoria = $array['id_categoria'];
        $categoria = $array['categoria'];
        $observaciones = $array['observaciones'];
        $boton = 'Modificar';
    }
}else{
    $id_categoria = null;
    $categoria = null;
    $observaciones = null;
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
            <form method="post" action="crud/agregar.php">
               
               <input name="id_categoria" type="hidden" value="<?php echo $id_categoria ?>">
                
                <div class="mb-3">
                    <label for="categoria" class="form-label">Ingrese el nombre de la categoria</label>
                    <input name="categoria" type="text" class="form-control" id="categoria" aria-describedby="Nombre de la categoria" required value="<?php echo $categoria ?>">
                </div>
                
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input name="observaciones" type="text" class="form-control" id="observaciones" aria-describedby="Observaciones" value="<?php echo $observaciones ?>">
                </div>
                
                <button type="submit" class="btn btn-primary"><?php echo $boton ?></button>
                <a class="btn btn-secondary" href="login.php" role="button">Volver</a>
                
            </form>
        </main>


    </div>
</body>
</html>