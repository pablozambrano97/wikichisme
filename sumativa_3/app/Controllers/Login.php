<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Login extends BaseController
{

  function login() {
    $data["titulo"] = "BlogPleto";
    return view('header') . view('login', $data) . view('footer');
  }

  function autenticar() {
    $usuario = $this->request->getPost("usuario");
    $contrasena = $this->request->getPost("contrasena");

    $modeloUsuarios = model(UsuariosModel::class);
    $user = $modeloUsuarios->autenticarUsuario($usuario, $contrasena);

    if (!$user) {
      $data["titulo"] = "BlogPleto";
      $data["error"] = "Usuario o contraseña incorrectos";
      $data["usuario"] = $usuario;
      $data["contrasena"] = $contrasena;
      return view('header') . view('login', $data) . view('footer');
    } else {
      $session = session();
      $session->set("usuario", $user);
      return redirect()->to("/home");
    }
  }

}