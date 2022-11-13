 <div class="container">
     <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
         <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
             <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                 <use xlink:href="#bootstrap" />
             </svg>
         </a>

         <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
             <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
             <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
             <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
             <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
             <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
         </ul>

         <div class="col-md-3 text-end">
             <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrase</button>
         </div>
     </header>
 </div>




 <div class="modal modal-signin bg-secondary py-5" tabindex="-1" role="dialog" id="modalLogin">
     <div class="modal-dialog" role="document">
         <div class="modal-content rounded-4 shadow">
             <div class="modal-header p-5 pb-4 border-bottom-0">
                 <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
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
                 <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
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
