<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class AdminUsuarios extends BaseController
{
  private $perfiles = [ 'U' => "Usuario", 'A' => "Administrador"];

  function index() {
    $session = session();
    $usuario = $session->get("usuario");
    if (!$usuario) {
      return redirect()->to("/");
    }
    if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
    }

    $usuarioModel = new UsuariosModel();
    $data["usuarios"] = $usuarioModel->getUsers();
    $data["idusuario"] = $usuario["idusuario"];
    $data["perfiles"] = $this->perfiles;

    return view("header").
           view("admin/usuarios_index", $data).
           view("footer");

  }

    function editar($idusuario) {
        $session = session();
        $usuario = $session->get("usuario");
        if (!$usuario) {
      return redirect()->to("/");
        }
        if ($usuario["perfil"] != 'A') {
      return redirect()->to("/home");
        }

        $usuarioModel = new UsuariosModel();
        if ($idusuario == 0) {
      $user = [
        "idusuario" => 0,
        "nombrecompleto" => "",
        "usuario" => "",
        "contrasena" => "",
        "activo" => 1,
        "perfil" => 0
      ];
        } else {
      $user = $usuarioModel->getUser($idusuario);
        }
        $data["usuario"] = $user;
        $data["perfiles"] = $this->perfiles;

        return view("header").
               view("admin/usuarios_editar", $data).
               view("footer");
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

        $idusuario = $this->request->getPost("idusuario");
        $nombre = $this->request->getPost("nombre");
        $username = $this->request->getPost("username");
        $contrasena = $this->request->getPost("contrasena");
        $estado = $this->request->getPost("estado");
        $perfil = $this->request->getPost("perfil");

        $errores = [];
        if (strlen(trim($nombre)) == 0) {
          $errores[] = "El nombre no puede estar vacío";
        }
        if (strlen(trim($username)) == 0) {
          $errores[] = "El username no puede estar vacío";
        }
        if (strlen(trim($contrasena)) == 0 && $idusuario == 0) {
          $errores[] = "La contraseña no puede estar vacía para un nuevo usuario";
        }

        if (count($errores) > 0) {
          $data["errores"] = $errores;
          $data["usuario"] = [
            "idusuario" => $idusuario,
            "nombrecompleto" => $nombre,
            "usuario" => $username,
            "contrasena" => $contrasena,
            "activo" => $estado,
            "perfil" => $perfil
          ];
          $data["perfiles"] = $this->perfiles;
          return view("header").
                view("admin/usuarios_editar", $data).
                view("footer");
        }

        $usuarioModel = new UsuariosModel();
        $usuarioModel->guardar([
          "idusuario" => $idusuario,
          "nombrecompleto" => $nombre,
          "usuario" => $username,
          "contrasena" => $contrasena,
          "activo"=> $estado,
          "perfil" => $perfil
        ]);

        return redirect()->to("/admin/usuarios");

  }
  
    function eliminar($idusuario) {
        $session = session();
        $usuario = $session->get("usuario");
        if (!$usuario) {
          return redirect()->to("/");
        }
        if ($usuario["perfil"] != 'A') {
          return redirect()->to("/home");
        }
    
        $usuarioModel = new UsuariosModel();
        $user = $usuarioModel->getUser($idusuario);
        if (!$user) {
          return redirect()->to("/admin/usuarios");
        }
    
        $data["usuario"] = $user;
        return view("header").
               view("admin/usuarios_eliminar", $data).
               view("footer");

    }
      function eliminarDefinitivo($idusuario) {
        $session = session();
        $usuario = $session->get("usuario");
        if (!$usuario) {
          return redirect()->to("/");
        }
        if ($usuario["perfil"] != 'A') {
          return redirect()->to("/home");
        }

        $userModel = new UsuariosModel();
        $user = $userModel->getUser($idusuario);
        if (!$user) {
          return redirect()->to("/admin/usuarios");
        }

        $userModel->eliminar($idusuario);

        return redirect()->to("/admin/usuarios");
  }
}