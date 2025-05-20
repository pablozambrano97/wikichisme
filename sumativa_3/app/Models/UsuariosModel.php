<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $useAutoIncrement = true;

    protected $allowedFields = ["idusuario", "nombrecompleto", "usuario", "contrasena", "activo", "perfil"];

    function autenticarUsuario($usuario, $contrasena) {
        $usuario = $this->where("usuario", $usuario)
                        ->where("contrasena", $contrasena)
                        ->where("activo", 1)
                        ->first();
        if ($usuario) {
            return $usuario;
        } else {
            return null;
        }

    }

        function getUsers() {
            return $this->findAll();
        }

        function getUser($idusuario) {
            return $this->where("idusuario", $idusuario)->first();
        }

        function guardar($usuario) {
            if ($usuario["idusuario"] == 0) {
                return $this->insert($usuario);
            } else {
                if (strlen(trim($usuario["contrasena"])) == 0) {
                    $updateUsuario = [
                        "nombrecompleto" => $usuario["nombrecompleto"],
                        "activo" => $usuario["activo"],
                        "perfil" => $usuario["perfil"]
                    ];
                } else {
                    $updateUsuario = [
                        "nombrecompleto" => $usuario["nombrecompleto"],
                        "contrasena" => $usuario["contrasena"],
                        "activo" => $usuario["activo"],
                        "perfil" => $usuario["perfil"]
                    ];
                }
                return $this->update($usuario["idusuario"], $updateUsuario);
            }
        }
        function eliminar($idusuario) {
            return $this->delete($idusuario);
        }
}