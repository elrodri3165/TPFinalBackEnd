<?php 
$sql = "SELECT * FROM productos WHERE activo = 1 AND destacado  = 1";
$resultado = mysqli_query($conexion, $sql);
$cantidad_productos = mysqli_num_rows($resultado);

if ($cantidad_productos > 3 ){ ?>
<div class="container">
    <h1 class="text-center">Productos destacados</h1>
    <div style="margin:0px auto;">
        <!-- Insert to your webpage where you want to display the carousel -->
        <div id="amazingcarousel-container-1">
            <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:1020px;margin:0px auto 0px;">
                <div class="amazingcarousel-list-container">
                    <ul class="amazingcarousel-list">

                        <?php foreach ($resultado as $row){ ?>

                        <li class="amazingcarousel-item">
                            <div class="amazingcarousel-item-container">

                                <div class="amazingcarousel-image">
                                    <a href="data:image/png;base64, <?php echo base64_encode($row['foto']);?>" title="titulo" class="html5lightbox" data-group="amazingcarousel-1">
                                        <img src="data:image/png;base64, <?php echo base64_encode($row['foto']);?>" alt="titulo" width="340px" height="250px" />
                                    </a>
                                </div>

                                <div class="amazingcarousel-title">
                                    <?php echo $row['nombre'] ?>
                                </div>

                                <div class="amazingcarousel-description">
                                    <?php echo $row['observaciones'] ?>
                                </div>

                                <div class="amazingcarousel-readmore">
                                    <a href="verproducto.php?id_producto=<?php echo ($row['id_producto']);?> " target="">Ir al producto</a>
                                </div>
                            </div>
                        </li>

                        <?php
                            }
                        ?>
                    </ul>
                    <div class="amazingcarousel-prev"></div>
                    <div class="amazingcarousel-next"></div>
                </div>
                <div class="amazingcarousel-nav"></div>
                <div class="amazingcarousel-engine"></div>
            </div>
        </div>
        <!-- End of body section HTML codes -->
    </div>
</div>
<?php
}
?>
