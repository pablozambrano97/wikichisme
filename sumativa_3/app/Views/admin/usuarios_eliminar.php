<div class="container">
  <h2>Eliminar Usuario</h2>

  <div class="row">
    <div class="col-12">
      <p>¿Está seguro de que desea eliminar el usuario "<?= $usuario["nombrecompleto"] ?>"?</p>
      <form action="/admin/usuarios/eliminar/<?= $usuario["idusuario"] ?>" method="post">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="/admin/usuarios" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>