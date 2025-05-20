<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionesModel extends Model
{
    protected $table      = 'publicaciones';
    protected $primaryKey = 'idpublicacion';
    protected $useAutoIncrement = true;

    protected $allowedFields = ["idpublicacion", "idtema", "idusuario", "titulo", "texto", "created_at", "updated_at"];

    public function getPublicaciones() {
        return $this->findAll();
    }

    public function getPublicacionesXTema($idtema) {
        return $this->where("idtema", $idtema)->findAll();
    }

    public function getPublicacion($idpublicacion) {
        return $this->where("idpublicacion", $idpublicacion)->first();
    }

    public function guardar($publicacion) {
        if ($publicacion["idpublicacion"] == 0) {
            return $this->insert($publicacion);
        } else {
            return $this->update($publicacion["idpublicacion"], $publicacion);
        }
    }

}
// 