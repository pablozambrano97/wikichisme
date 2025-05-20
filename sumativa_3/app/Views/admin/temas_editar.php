<div class="container">
  <h2 class="mt-3">Editar Tema</h2>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <form action="/admin/temas/guardar" method="post">
            <input type="hidden" name="idtema" value="<?= $tema["idtema"] ?>">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tema["nombre"] ?>" required />
            </div>
            <div class="mb-3">
              <a class="btn btn-light" href="/admin/proyectos">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>


</div>