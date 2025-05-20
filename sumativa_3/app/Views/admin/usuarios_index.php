<?php

$estados = [ 0 => "Inactivo", 1 => "Activo"];

?>
<div class="container">
  <h2>Adminitración de Usuarios</h2>
  <div class="row">
    <div class="col-12" style="text-align: right;">
      <a href="/admin/usuarios/editar/0" class="btn btn-primary">Crear Usuario</a>
    </div>
    <div class="col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Username</th>
            <th scope="col">Estado</th>
            <th scope="col">Perfil</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($usuarios as  $usuario) { ?>
            <tr>
              <td><?= $usuario["nombrecompleto"] ?></td>
              <td><?= $usuario["usuario"] ?></td>
              <td><?= $estados[$usuario["activo"]] ?></td>
              <td><?= $perfiles[$usuario["perfil"]] ?></td>
              <td>
                <?php if ($idusuario !== $usuario["idusuario"]) { ?>
                <a href="/admin/usuarios/eliminar/<?= $usuario["idusuario"] ?>" class="btn btn-danger">Eliminar</a>
                <?php } ?>
                <a href="/admin/usuarios/editar/<?= $usuario["idusuario"] ?>" class="btn btn-warning">Editar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">
              Total usuarios: <?= count($usuarios) ?>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</div>