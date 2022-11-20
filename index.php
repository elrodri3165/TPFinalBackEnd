<?php 
session_start();
require 'appdb/conexion.php';
require 'functions/carrito.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container-fluid m-0 p-0">

        <?php require 'templates/header.php'; ?>

        <?php require 'templates/notificacion.php'; ?>

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

            <div class="container p-5">
               <h2 class="text-center">Características del proyecto</h2>
                <ul class="list-group rouded">
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Plataforma autoadministrable</h4>
                        <p>EL usuario puede cargar, categorias, productos. El producto admite carga de fotos, precio, stock. Posee funciones de revertir compras y sumar stock o editar precios. Alta, baja y eliminacion de categorias. Alta, baja y eliminacion de productos.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Adaptable a todos los dispositivos</h4>
                        <p>Todas las pantallas son adatables a los dinstintos dispotivivos. Posee vistas distintas para PC, tablet o telefono, para que su visualizacion sea óptima en todos los casos.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Multi-usuario</h4>
                        <p>Permite generar multiples usuarios para administar el panel.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Panel para manejar las ventas</h4>
                        <p>Posee un panel para administrar las ventas.</p>
                    </li>
                     <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Lsitado de clientes</h4>
                        <p>Listado de clientes que crearon cuenta en el sitio web.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Validaciones de seguridad</h4>
                        <p>Posee validaciones de seguridad para que no se permita el acceso a pantallas sin permisos. Poseen distintos permisos los usuarios compradores y los adminstradores.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Control de stock</h4>
                        <p>No permite la compra de productos sin stock. El stock se decrementa solo al comprar. Funciones para incrementar stock rápidamente. Funciones de rechazar compra para revertir stock.</p>
                    </li>
                    <li class="list-group-item list-group-item-dark mx-3 my-2 rounded-1">
                        <h4>Slider de productos destacados</h4>
                        <p>Slider central, automaticamente generado con los productos destacados. Se pueden destacar al cargar, o tambien en edicion.</p>
                    </li>
                </ul>
            </div>

            <?php require 'templates/carrusel.php'; ?>

        </main>

        <?php require 'templates/footer.php'; ?>

    </div>
</body>

</html>
