<?php

namespace App\Controllers;

use App\Models\PublicacionesModel;
use App\Models\TemasModel;

class AdminPublicaciones extends BaseController
{
  function editarPublicacion($idtema, $idpublicacion) {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }

    $temaModel = new TemasModel();
    $tema = $temaModel->getTema($idtema);
    if (!$tema) {
      return redirect()->to("/home");
    }

    $publicacionModel = new PublicacionesModel();
    if ($idpublicacion == 0) {
      $publicacion = [
        "idpublicacion" => 0,
        "idtema" => 0,
        "titulo" => "",
        "texto" => ""
      ];
    } else {
      $publicacion = $publicacionModel->getPublicacion($idpublicacion);
      if (!$publicacion) {
        return redirect()->to("/home");
      }
    }
    $data["tema"] = $tema;
    $data["publicacion"] = $publicacion;
    return view("header").
           view("admin/publicaciones_editar", $data).
           view("footer");

  }

  function guardar()  {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }

    $idtema = $this->request->getPost("idtema");
    $idpublicacion = $this->request->getPost("idpublicacion");
    $titulo = $this->request->getPost("titulo");
    $texto = $this->request->getPost("texto");

    $errores = [];
    if (empty($titulo)) {
      $errores[] = "El título es obligatorio";
    }
    if (empty($texto)) {
      $errores[] = "El contenido es obligatorio";
    }

    $temaModel = new TemasModel();
    $tema = $temaModel->getTema($idtema);
    if (!$tema) {
      return redirect()->to("/home");
    }
    $publicacionModel = new PublicacionesModel();
    $publicacionModel->guardar([
      "idpublicacion" => $idpublicacion,
      "idtema" => $idtema,
      "idusuario" => $usuario["idusuario"],
      "titulo" => $titulo,
      "texto" => $texto
    ]);

    return redirect()->to("tema/$idtema");

  }
}