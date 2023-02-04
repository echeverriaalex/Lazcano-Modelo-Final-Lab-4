<main class="d-flex align-items-center justify-content-center height-100" >
     <div class="content">
          <header class="text-center">
               <h2>Final</h2>
          </header>

          <form action="<?=FRONT_ROOT?>Users/login" method="post" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control form-control-lg" name="email" placeholder="Ingresar usuario" required>
               </div>
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Ingresar constraseña" required>
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
          </form>
     </div>
</main>