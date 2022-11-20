<?php
session_start();
/*si encuentro algo en la session usuario y si el rol es adminstrador dejo ingresar al panel.
sino redireccio a index con error en sin permisos*/
if (isset ($_SESSION['user']) && $_SESSION['rol'] == 1){ ?>
<!DOCTYPE html>
<html lang="es">

<?php require 'templates/head.php';?>

<body>
    <div class="container">

        <?php require 'templates/nav_login.php'; ?>

        <?php require 'appdb/conexion.php'; ?>

        <?php require 'templates/notificacion.php'; ?>

        <h3 class="bg-dark text-white m-0 mt-3 p-2">Clientes</h3>
        <div class="table-responsive">
            <table class="table table-striped mb-3 border">
                <thead class="table-dark">
                    <tr>
                        <th>Id_cliente</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <?php
        $sql = "SELECT * FROM users WHERE activo = 1 AND id_rol = 2";

        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $fila['id_user'];?> </td>
                    <td><?php echo $fila['apellido'];?> </td>
                    <td><?php echo $fila['nombre'];?> </td>
                    <td><?php echo $fila['email'];?> </td>
                </tr>
                <?php } } ?>
            </table>
        </div>

        <h3 class="bg-dark text-white m-0 mt-3 p-2">Ventas
            <form action="" class="d-inline-flex h6">
                <select class="form-control" aria-label="" name="ESTADO" required>
                    <option value="">Filtrar por estado</option>
                    <option value="PENDIENTE-PAGO">PENDIENTE-PAGO</option>
                    <option value="COBRADA">COBRADA</option>
                    <option value="FINALIZADA">FINALIZADA</option>
                </select>
                <input class="btn btn-outline-light mx-1" type="submit" value="Buscar">
            </form>
        </h3>

        <div class="table-responsive">
            <table class="table table-striped mb-3 border">
                <thead class="table-dark">
                    <tr>
                        <th>ID venta</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Productos</th>
                        <th>Direccion</th>
                        <th>Método pago</th>
                        <th>Estado</th>
                        <th>Modificar estado</th>
                        <th>Rechazar venta</th>
                    </tr>
                </thead>
                <?php
        if (isset ($_GET['ESTADO'])){
            $estado = $_GET['ESTADO'];
            $sql = "SELECT * FROM ventas JOIN users on ventas.id_user = users.id_user AND estado = '$estado'";
        }else{
            $sql = "SELECT * FROM ventas JOIN users on ventas.id_user = users.id_user";
        };
        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $fila['id_ventas'];?> </td>
                    <td><?php echo $fila['apellido'].' '.$fila['nombre'];?> </td>
                    <td><?php echo $fila['email']?></td>
                    <td><?php echo $fila['productos'];?> </td>
                    <td><?php echo $fila['direccion'];?> </td>
                    <td><?php echo $fila['metodo_pago'];?> </td>
                    <td><?php echo $fila['estado'];?> </td>
                    <td>
                        <?php 
                    if ($fila['estado'] != 'RECHAZADA'){ ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarestado<?php echo $fila['id_ventas'];?>">Modificar estado</button>
                        <?php 
                                                       }
                                                    ?>
                    </td>
                    <td>
                        <?php 
                    if ($fila['estado'] != 'RECHAZADA'){ ?>
                        <a class="btn btn-danger" href="crud/rechazar_venta.php?id_ventas=<?php echo $fila['id_ventas'];?>" role="button">Rechazar venta</a>
                        <?php
                                                        }
                                                    ?>

                    </td>
                </tr>

                <div class="modal fade" id="modificarestado<?php echo $fila['id_ventas'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="crud/modificar_estado_venta.php" enctype="multipart/form-data">
                                <div class="modal-header bg-dark text-white">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar estado de la venta</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_ventas" class="form-label">Id producto</label>
                                        <input name="id_ventas" type="number" class="form-control" id="id_ventas" aria-describedby="Id ventas" required value="<?php echo $fila['id_ventas'];?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select name="estado" type="number" class="form-control" id="estado" aria-describedby="Estado" required>
                                            <option value="<?php echo $fila['stock'];?>" selected><?php echo $fila['estado'];?></option>
                                            <option value="PENDIENTE-PAGO">PENDIENTE-PAGO</option>
                                            <option value="COBRADA">COBRADA</option>
                                            <option value="FINALIZADA">FINALIZADA</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-dark">Modificar estado</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <?php } } ?>
            </table>
        </div>

        <h3 class="bg-dark text-white m-0 mt-3 p-2">Categorias</h3>
        <div class="table-responsive">
            <table class="table table-striped mb-3 border">
                <thead class="table-dark">
                    <tr>
                        <th>ID_categoria</th>
                        <th>Nombre</th>
                        <th>Observaciones</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <?php
        $sql = "SELECT * FROM categorias WHERE activo = 1";

        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $fila['id_categoria'];?> </td>
                    <td><?php echo $fila['categoria'];?> </td>
                    <td><?php echo $fila['observaciones'];?> </td>
                    <td><a class="btn btn-primary" href="form_agregar_categoria.php?id_categoria=<?php echo $fila['id_categoria'];?>" role="button">Modificar</a></td>
                    <td><a class="btn btn-danger" href="crud/eliminar.php?id_categoria=<?php echo $fila['id_categoria'];?>" role="button">Borrar</a></td>
                </tr>
                <?php } } ?>
            </table>
        </div>

        <hr>

        <h3 class="bg-dark text-white m-0 mt-3 p-2">Productos</h3>
        <div class="table-responsive">
            <table class="table table-striped mb-3 border">
                <thead class="table-dark">
                    <tr>
                        <th>ID_producto</th>
                        <th>ID_categoria</th>
                        <th>Nombre</th>
                        <th>Observaciones</th>
                        <th>Foto</th>
                        <th>Stock</th>
                        <th>Destacado</th>
                        <th>Agregar stock</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <?php
        $sql = "SELECT * FROM productos WHERE activo = 1";

        $resultado = mysqli_query($conexion, $sql);
                               
        if ($resultado != null){
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $fila['id_producto'];?> </td>
                    <td><?php echo $fila['id_categoria'];?> </td>
                    <td><?php echo $fila['nombre'];?> </td>
                    <td><?php echo $fila['observaciones'];?> </td>
                    <td><img src="data:image/png;base64, <?php echo base64_encode($fila['foto']);?>" alt="" width="100px" height="100px"> </td>
                    <td><?php echo $fila['stock'];?> </td>
                    <td><?php
                        if($fila['destacado'] == 1){
                            echo 'SI';
                        }else{
                            echo 'NO';
                        }
                    ?> </td>
                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarstock<?php echo $fila['id_producto'];?>">Modificar Stock</button></td>
                    <td><a class="btn btn-primary" href="form_agregar_producto.php?id_producto=<?php echo $fila['id_producto'];?>" role="button">Modificar</a></td>
                    <td><a class="btn btn-danger" href="crud/eliminar.php?id_producto=<?php echo $fila['id_producto'];?>" role="button">Borrar</a></td>
                </tr>


                <div class="modal fade" id="agregarstock<?php echo $fila['id_producto'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="crud/agregar_stock.php" enctype="multipart/form-data">
                                <div class="modal-header bg-dark text-white">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Stock</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="id_producto" class="form-label">Id producto</label>
                                        <input name="id_producto" type="number" class="form-control" id="id_producto" aria-describedby="Id producto" required value="<?php echo $fila['id_producto'];?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Nuevo stock</label>
                                        <input name="stock" type="number" class="form-control" id="stock" aria-describedby="stock" required value="<?php echo $fila['stock'];?>">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-dark">Modificar stock</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } } ?>
            </table>
        </div>
    </div>

</body>

</html>


<?php 
}else{
    header ('Location: index.php?error=sinpermisos');
}
