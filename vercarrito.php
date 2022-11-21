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

        <div class="container">
            <main>

                <div class="py-5 text-center">
                    <i class="bi bi-wallet2" style="font-size:60px;"></i>
                    <i class="bi bi-cash-coin" style="font-size:60px;"></i>
                    <h2>Finalizar la compra</h2>
                    <p class="lead">Por favor completa los datos para finalizar la compra. Luego un vendedor te contactara para concretar el pago. Si luego de 24 hrs no se realiza el pago, se rechaza la venta y el stock vuelve a estar disponible para la venta.</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Tu carrito</span>
                            <span class="badge bg-primary rounded-pill"><?php echo $_SESSION['carrito']['cantidad_productos']?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php 
                            foreach ($_SESSION['carrito']['productos'] as $producto){
                                $sql = "SELECT * FROM productos WHERE activo = 1 AND id_producto = $producto";
                                $producto = mysqli_query($conexion, $sql);
                                foreach ($producto as $row){ ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $row['nombre']?></h6>
                                    <small class="text-muted"><?php echo $row['observaciones']?></small>
                                </div>
                                <span class="text-muted"><?php echo $row['precio']?></span>
                            </li>

                            <?php 
                                }
                            }
                            ?>

                        </ul>
                        
                        <a class="btn btn-dark" href="vercarrito.php?vaciar" role="button">Vaciar carrito</a>

                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Dirección de envío</h4>
                        <form class="needs-validation" novalidate method="post" action="confirmarcompra.php">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" id="address" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su dirección de envío
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <label for="country" class="form-label">Provincia</label>
                                    <select class="form-select" id="country" required>
                                        <option value="">Por favor selecione</option>
                                        <option>Buenos Aires</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor seleccione
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="state" class="form-label">Seleccione Ciudad</label>
                                    <select name="ciudad" class="form-select" id="state" required>
                                        <option value="">Por favor seleccione</option>
                                        <option>Bahía Blanca</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor seleccione
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Código postal</label>
                                    <input name="codigo_postal" type="text" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Por favor cargue su código postal
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Pago</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input name="metodo-pago" id="credit" name="paymentMethod" type="radio" class="form-check-input" value="EFECTIVO" required>
                                    <label class="form-check-label" for="credit">Efectivo</label>
                                </div>
                                <div class="form-check">
                                    <input name="metodo-pago" id="debit" name="paymentMethod" type="radio" class="form-check-input" value="TRANSFERENCIA">
                                    <label class="form-check-label" for="debit">Trasferencia bancaria</label>
                                </div>
                                <div class="form-check">
                                    <input name="metodo-pago" name="paymentMethod" type="radio" class="form-check-input" value="MERCADO-PAGO">
                                    <label class="form-check-label" for="paypal">Mercado Pago</label>
                                </div>
                                <p>*Luego de concretar la compra reservaremos stock por 24 hrs y un vendedor te contactara vía correo electrónico para que abones con tu medio de pago elegido.</p>
                            </div>

                            <hr class="my-4">

                            <?php 
                            if (isset($_SESSION['user']) && $_SESSION['carrito']['cantidad_productos'] > 0){ ?>
                            <button class="w-100 btn btn-dark btn-lg" type="submit">Confirmar compra</button>

                            <?php
                            }else{ ?>
                            <div class="alert alert-dark" role="alert">
                                <h4 class="alert-heading">Para poder terminar la compra debe loguearse y debe elegir al menos un producto en el carrito!</h4>
                                <button type="button" class="btn btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</button>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrase</button>
                                <hr>
                                <p class="mb-0">Muchas gracias!</p>
                            </div>

                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </main>
        </div>
        <script src="js/form-control.js" type="text/javascript"></script>
        <?php require 'templates/footer.php'; ?>

    </div>
</body>

</html>
