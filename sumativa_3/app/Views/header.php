<?php
namespace App\Views;
$session = session();
$usuario = $session->get("usuario");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WikiChisme</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/estilos.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/home">Wikichisme</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
            <?php if (!$usuario) { ?>
            <a class="nav-link active" aria-current="page" href="/">Ingresar</a>
            <?php } else { ?>
              <?php if ($usuario["perfil"] == 'A') { ?>
                <a class="nav-link active" aria-current="page" href="/admin/proyectos">Proyectos</a>
                <a class="nav-link active" aria-current="page" href="/admin/usuarios">Usuarios</a>
              <?php } ?>
              <a class="nav-link active" aria-current="page" href="/logout">Cerrar sesión</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
  </header>