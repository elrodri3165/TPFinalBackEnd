<?php require 'appdb/conexion.php';
if (isset ($_GET['id_producto'])){
    $id_producto = $_GET['id_producto'];
    $sql = "SELECT * FROM productos WHERE activo = 1 AND id_producto = $id_producto";
    $productos = mysqli_query($conexion, $sql);
}
?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container-fluid m-0 p-0">

        <?php require 'templates/header.php'; ?>

        <main>

            <div class="album py-5 bg-light">
                <div class="container">


                    <div class="row">

                        <?php foreach ($productos as $producto){ ?>

                        <div class="col">
                            <div class="card shadow-sm">

                                <img src="data:image/png;base64, <?php echo base64_encode($producto['foto']);?>" alt="" width="100%" height="100%">
                                
                                <div class="text-center bg-dark text-white p-3"><?php echo $producto['nombre']?></div>


                                <div class="card-body" style="min-height:150px;">
                                    <p class="card-text"><?php echo $producto['observaciones']?></p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="btn-group">
                                            
                                            <button type="button" class="btn btn-sm btn-outline-dark">Comprar</button>
                                        </div>
                                        <small class="text-muted">Stock: <?php echo $producto['stock']?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>



        </main>

        <?php require 'templates/footer.php'; ?>

    </div>
</body>
</html>