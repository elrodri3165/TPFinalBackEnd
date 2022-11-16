<?php require 'appdb/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container-fluid m-0 p-0">

        <?php require 'templates/header.php'; ?>

        <main>
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                    <h1 class="display-4 fw-normal">Tienda virtual</h1>
                    <p class="lead fw-normal">Totalmente autoadministrable, con categorias de productos, galería de fotos y carrito.</p>
                    <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                </div>
                <div class="product-device shadow-sm d-none d-md-block">
                    <img src="" alt="">
                </div>
                <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            </div>

            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Totalmente autoadministrable</h2>
                        <p class="lead">Con un panel de acceso, el usuario pude cargar sus productos</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    </div>
                </div>
                
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Con categorias de productos</h2>
                        <p class="lead">Se puede agregar, modificar o quitar categorias.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    </div>
                </div>
                
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Con slider de productos destacados.</h2>
                        <p class="lead">Cagando al menos 3 productos destacados, se genera un slider automático en la página central.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    </div>
                </div>
                
            </div>
            
                <?php require 'templates/carrusel.php'; ?>
                
        </main>

        <?php require 'templates/footer.php'; ?>

    </div>
</body>

</html>
