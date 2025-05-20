<?php

namespace App\Controllers;

use App\Models\PublicacionesModel;
use App\Models\TemasModel;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
      if (!$session->has("usuario"))  {
          return redirect()->to("/");
      }

      $data["titulo"] = "WikiChisme - " . $session->get("usuario")["nombrecompleto"];

      $modelPublicaciones = model(PublicacionesModel::class);
      $data["publicaciones"] = $modelPublicaciones->getPublicaciones();
      $modelTemas = model(TemasModel::class);
      $data["temas"] = $modelTemas->getTemas();


      return view('header') . view('paginainicio', $data) . view('footer');
    }
    public function tema($idtema)
      {
      
        $session = session();
        if (!$session->has("usuario"))  {
            return redirect()->to("/");
        }
      
        $modelTemas = model(TemasModel::class);
        $tema = $modelTemas->getTema($idtema);
      
        if ($tema) {
          $modelPublicaciones = model(PublicacionesModel::class);
          $data["tema"] = $tema;
          $data["publicaciones"] = $modelPublicaciones->getPublicacionesXTema($idtema);
          return view('header') . view('tema', $data) . view('footer');
        }
        return redirect()->to("/home")->with("error", "El tema no existe");
    }

    function publicacion($idpublicacion) {
      $session = session();
      if (!$session->has("usuario"))  {
          return redirect()->to("/");
      }

      $publicacionModel = new PublicacionesModel();
      $publicacion = $publicacionModel->getPublicacion($idpublicacion);
      if (!$publicacion) {
        return redirect()->to("/home");
      }
      $temaModel = new TemasModel();
      $tema = $temaModel->getTema($publicacion["idtema"]);
      if (!$tema) {
        return redirect()->to("/home");
      }

      $data["publicacion"] = $publicacion;
      $data["tema"] = $tema;

      return view("header").
             view("publicacion", $data).
             view("footer");

    }
}
