<?php 
session_start();
require 'appdb/conexion.php';
require 'functions/carrito.php';

if (isset ($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    $sql = "SELECT productos.id_producto, productos.nombre, productos.observaciones, productos.foto, productos.stock, productos.precio, categorias.categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE productos.activo = 1 AND categorias.categoria = '$categoria'";
}else{
    $sql = "SELECT * FROM productos WHERE activo = 1";
}
$productos = mysqli_query($conexion, $sql);
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

                    <?php 
                    if (isset ($_GET['categoria'])){ ?>
                    <h2 class="text-center"><?php echo $categoria ?></h2>
                    <?php
                    }
                    ?>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                        <?php 
                        foreach ($productos as $producto){ ?>

                        <div class="col">
                            <div class="card shadow-sm">

                                <img src="data:image/png;base64, <?php echo base64_encode($producto['foto']);?>" alt="" width="100%" height="425">
                                
                                <div class="text-center bg-dark text-white p-3"><?php echo $producto['nombre']?></div>


                                <div class="card-body" style="min-height:150px;">
                                    <p class="card-text"><?php echo $producto['observaciones']?></p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-dark" href="verproducto.php?id_producto=<?php echo $producto['id_producto']?>" role="button">Ver</a>
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