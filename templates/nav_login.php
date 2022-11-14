<div class="bg-dark text-white p-1 mb-1">
    <h1 class="">Panel administrador</h1>
    <hr>
    <div>Usuario: <?php echo $_SESSION['user'] ?></div>
    <div>Apellido y nombre: <?php echo $_SESSION['apellido'],' ' , $_SESSION['nombre'] ?></div>
    <div>Email: <?php echo $_SESSION['email'] ?></div>
</div>

<div class="my-1">
    <a class="btn btn-lg btn-primary" href="form_agregar_categoria.php" role="button">Agregar categoria</a>
    <a class="btn btn-lg btn-primary" href="form_agregar_producto.php" role="button">Agregar producto</a>
    <a class="btn btn-secondary" href="salir.php" role="button">Salir</a>
</div>
