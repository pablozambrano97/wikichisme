<div class="container">
  <div class="row mt-5">
    <div class="col-sm-1 col-md-2 col-lg-3"></div>
    <div class="col-sm-10 col-md-8 col-lg-6">
      <h2 class="mt-3">Iniciar sesión</h2>
      <form action="/login" method="post" id="formLogin">
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="usuario" name="usuario" required 
            value="<?php if (isset($usuario)) { echo $usuario; } ?>" >
          <div class="mensaje-error" id="usuarioMensaje"></div>
        </div>
        <div class="mb-3">
          <label for="contrasena" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" required
            value="<?php if (isset($contrasena)) { echo $contrasena; } ?>" >
          <div class="mensaje-error" id="contrasenaMensaje"></div>
        </div>
        <?php if (isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      </form>
    </div>
    <div class="col-sm-1 col-md-2 col-lg-3"></div>
  </div>

  <script src="/assets/scripts/login.js"></script>

</div>