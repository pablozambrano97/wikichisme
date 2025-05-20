<div class="container">
  <h2 class="mt-3">Editar Usuario</h2>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <form action="/admin/usuarios/guardar" method="post">
            <input type="hidden" name="idusuario" value="<?= $usuario["idusuario"] ?>">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario["nombrecompleto"] ?>"  />
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre de usuario</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $usuario["usuario"] ?>" required />
            </div>
            <!-- <div class="mb-3">
              <label for="contrasena" class="form-label">Password</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required />
            </div>
            <div class="mb-3">
              <label for="confirmacion" class="form-label">Confirmación</label>
              <input type="password" class="form-control" id="confirmacion" name="confirmacion" required />
            </div> -->
            <div class="mb-3">
              <label for="contrasena" class="form-label">Password</label>
              <input type="text" class="form-control" id="contrasena" name="contrasena" 
                <?php if ($usuario["idusuario"] == 0) { ?>required<?php } ?>
              />
            </div>
            <div class="mb-3 form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" value="1" id="estado" name="estado" 
                <?php if ($usuario["activo"] == 1) {?>checked<?php } ?>
              >
              <label class="form-check-label" for="estado">
                Activo
              </label>
            </div>
            <div class="mb-3">
              <label for="perfil" class="form-label">Perfil de usuario</label>
              <select class="form-select" id="perfil" name="perfil">
                <?php foreach($perfiles as $key => $perfil) { ?>
                  <option
                    value="<?= $key ?>"
                    <?php if ($usuario["perfil"] == $key) {?>selected<?php } ?>
                  ><?= $perfil ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <?php if (isset($errores) && count($errores) > 0) { ?>
              <div class="alert alert-danger" role="alert">
                <ul>
                  <?php foreach($errores as $error) { ?>
                    <li><?= $error ?></li>
                  <?php } ?>
                </ul>
              </div>
              <?php } ?>
              <a class="btn btn-light" href="/admin/usuarios">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>