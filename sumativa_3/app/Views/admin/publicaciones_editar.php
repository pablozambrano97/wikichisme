<div class="container">
  <h2 class="mt-3">Editar Publicación para <?= $tema["nombre"] ?></h2>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <form action="/editar/publicacion/guardar" method="post">
            <input type="hidden" name="idtema" value="<?= $tema["idtema"] ?>">
            <input type="hidden" name="idusuario" value="<?= $publicacion["idpublicacion"] ?>">
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $publicacion["titulo"] ?>"  />
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Contenido</label>
              <textarea class="form-control" id="texto" name="texto" rows="10"><?= $publicacion["texto"] ?></textarea>
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
              <a class="btn btn-light" href="/tema/<?= $tema["idtema"] ?>">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>