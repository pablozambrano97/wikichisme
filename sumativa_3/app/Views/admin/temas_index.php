<div class="container mt-3">
  <h2>Adminitración de Proyectos</h2>

  <div class="row">
    <div class="col-12" style="text-align: right;">
      <a href="/admin/temas/editar/0" class="btn btn-primary">Crear proyecto</a>
    </div>
    <?php foreach($temas as $tema) { ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <div class="card-body">
            <p class="card-text">
              <?= $tema["nombre"] ?>
            </p>
            <a href="/admin/temas/eliminar/<?= $tema["idtema"] ?>" class="btn btn-danger">Eliminar</a>
            <a href="/admin/temas/editar/<?= $tema["idtema"] ?>" class="btn btn-warning">Editar</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>


</div>