<?php

namespace App\Controllers;

use App\Models\TemasModel;

class AdminTemas extends BaseController
{
  function index() {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }

    $temasModel = new TemasModel();
    $data["temas"] = $temasModel->getTemas();

    return view("header").
           view("admin/temas_index", $data).
           view("footer");
  }

    function editar($idtema) {
        $session = session();
        $usuario = $session->get("usuario");
        if (!$usuario) {
          return redirect()->to("/");
        }
        if ($usuario["perfil"] != 'A') {
          return redirect()->to("/home");
        }

        $temasModel = new TemasModel();
        if ($idtema == 0) {
          $tema = [ "idtema" => 0, "nombre" => "" ];
        } else {
          $tema = $temasModel->getTema($idtema);
          if (!$tema) {
            return redirect()->to("/admin/temas");
          }
        }
        $data["tema"] = $tema;
        return view("header").
                view("admin/temas_editar", $data).
                view("footer");
  }

    function eliminar($idtema) {
        $session = session();
        $usuario = $session->get("usuario");
        if (!$usuario) {
          return redirect()->to("/");
        }
        if ($usuario["perfil"] != 'A') {
          return redirect()->to("/home");
        }

        $temasModel = new TemasModel();
        $tema = $temasModel->getTema($idtema);
        if (!$tema) {
          return redirect()->to("/admin/proyectos");
        }
        $data["tema"] = $tema;
        return view("header").
                view("admin/temas_eliminar", $data).
                view("footer");
  }

  function eliminarDefinitivo($idtema) {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }
    $temasModel = new TemasModel();
    $tema = $temasModel->getTema($idtema);
    if (!$tema) {
      return redirect()->to("/admin/proyectos");
    }
    $temasModel->eliminarTema($idtema);
    return redirect()->to("/admin/proyectos");
  }

  function guardar() {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }

    $temasModel = new TemasModel();
    $idtema = $this->request->getPost("idtema");
    $nombre = $this->request->getPost("nombre");

    $temasModel->guardarTema($idtema, $nombre);
    return redirect()->to("/admin/proyectos");
  }
}