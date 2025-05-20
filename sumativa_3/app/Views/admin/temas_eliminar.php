<div class="container">
  <h2>Eliminar Tema</h2>

  <div class="row">
    <div class="col-12">
      <p>¿Está seguro de que desea eliminar el tema "<?= $tema["nombre"] ?>"?</p>
      <form action="/admin/temas/eliminar/<?= $tema["idtema"] ?>" method="post">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="/admin/proyectos" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>