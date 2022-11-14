<?php require 'appdb/conexion.php'; 

$sql = "SELECT * FROM productos WHERE activo = 1 AND destacado  = 1";
$resultado = mysqli_query($conexion, $sql);
$producto = [];

foreach ($resultado as $row){
    array_push($producto, $row);
}
shuffle($producto);
?>


<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container-fluid m-0 p-0">

        <?php require 'templates/header.php'; ?>

        <main>
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                    <h1 class="display-4 fw-normal">Punny headline</h1>
                    <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
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
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <img src="data:image/png;base64, <?php echo base64_encode($producto[0]['foto']);?>" alt="">
                    </div>
                </div>
                
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <img src="data:image/png;base64, <?php echo base64_encode($producto[2]['foto']);?>" alt="">
                    </div>
                </div>
                
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <img src="data:image/png;base64, <?php echo base64_encode($producto[3]['foto']);?>" alt="">
                    </div>
                </div>
                
            </div>

            
        </main>

        <?php require 'templates/footer.php'; ?>

    </div>
</body>

</html>
