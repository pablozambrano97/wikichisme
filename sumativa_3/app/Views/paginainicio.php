 <main class="container mt-2">
    <h1><?= $titulo ?></h1>

    <h2 class="mt-3">Proyectos</h2>
    <div class="row">
      <?php foreach($temas as $tema) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <div class="card">
            <div class="card-body">
              <p class="card-text">
                <a href="/tema/<?= $tema["idtema"] ?>" class="text-decoration-none">
                  <?= $tema["nombre"] ?>
                </a>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <h2>Publicaciones</h2>
    <div class="row">
      <?php foreach($publicaciones as $publicacion) { ?>

        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card">
            <img src="https://picsum.photos/800/200?<?= $publicacion["idpublicacion"] ?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><?= $publicacion["titulo"] ?></h5>
              <p class="card-text"><?= substr($publicacion["texto"], 0, 60) ?></p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>