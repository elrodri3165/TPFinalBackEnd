<div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap" />
            </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="index.php" class="nav-link px-2 link-dark">Nosotros</a></li>
            <li><a href="verproductos.php" class="nav-link px-2 link-dark">Ver productos</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Contacto</a></li>

        </ul>

        <div class="col-md-3 text-end">
            <a class="btn me-3 text-dark position-relative" href="vercarrito.php">
                <i class="bi bi-cart-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"><?php echo $_SESSION['carrito']['cantidad_productos'] ?></span>
            </a>

            <button type="button" class="btn btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</button>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrase</button>
        </div>
    </header>
</div>

<header class="site-header sticky-top py-1">

    <?php
    if (isset ($_SESSION['rol']) && $_SESSION['rol'] == 2){ ?>
    <div class="text-white d-flex justify-content-end px-3">
        <div class="p-2">Usuario: <?php echo $_SESSION['user'] ?> </div>
        <div class="">
            <a class="btn btn-logout" href="salir.php" role="button">Salir</a>
        </div>
    </div>
    <?php
        } 
    ?>
</header>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item mx-5">
                    <a class="nav-link text-white" href="verproductos.php" aria-label="Product">
                        TODAS
                    </a>
                </li>
                
                <?php 
                $sql = "SELECT categoria FROM categorias WHERE activo = 1";
                $resultado  = mysqli_query($conexion, $sql);
        
                foreach ($resultado as $row){ ?>
                <li class="nav-item mx-5">
                    <a href="verproductos.php?categoria=<?php echo $row['categoria']?>" role="button" class="nav-link text-white"><?php echo $row['categoria']?></a>
                </li>

                                    <?php
                                    }
                                    ?>
            </ul>
        </div>
    </div>
</nav>




<div class="modal modal-signin bg-secondary py-5" tabindex="-1" role="dialog" id="modalLogin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Login de usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="" method="post" action="validarLogin.php">
                    <div class="form-floating mb-3">
                        <input type="number" name="dni" class="form-control rounded-3" id="floatingInput" placeholder="Ingrese su numero de documento">
                        <label for="floatingInput">DNI</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Ingresar</button>

                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal modal-signin bg-secondary py-5" tabindex="-1" role="dialog" id="modalRegistro">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Registro de usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="" method="post" action="registro.php">
                    <div class="form-floating mb-3">
                        <input type="text" name="apellido" class="form-control rounded-3" id="floatingInput" placeholder="Ingrese su apellido">
                        <label for="floatingInput">Apellido</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" class="form-control rounded-3" id="floatingInput" placeholder="Ingrese su nombre">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="dni" class="form-control rounded-3" id="floatingInput" placeholder="Ingrese su numero de documento">
                        <label for="floatingInput">DNI</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="Ingrese su correo">
                        <label for="floatingInput">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Registrarse</button>

                </form>
            </div>
        </div>
    </div>
</div>
