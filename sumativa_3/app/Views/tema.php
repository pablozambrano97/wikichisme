<main class="container mt-2">
  <h1><?= $tema["nombre"] ?></h1>

    <div class="row">

      <div class="col-sm-12 col-md-12 col-lg-12 mb-12" style="text-align: right;">
        <a href="/editar/publicacion/<?= $tema["idtema"] ?>/0" class="btn btn-primary">Nueva Publicación</a>
      </div>
 
      <?php foreach($publicaciones as $publicacion) { ?>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">

          <div class="card"">
            <img src="https://picsum.photos/800/200?<?= $publicacion["idpublicacion"] ?>" class="card-img-top" alt="">
            <div class="card-body">
              <a href="/publicacion/<?= $publicacion["idpublicacion"] ?>">
              <h5 class="card-title"><?= $publicacion["titulo"] ?></h5>
              </a>
              <p class="card-text"><?= substr($publicacion["texto"], 0, 60) ?></p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>

        </div>

      <?php } ?>

    </div>

</main>