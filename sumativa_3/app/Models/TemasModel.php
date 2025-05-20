<?php

namespace App\Models;

use CodeIgniter\Model;

class TemasModel extends Model
{
    protected $table      = 'temas';
    protected $primaryKey = 'idtema';
    protected $useAutoIncrement = true;

    protected $allowedFields = ["idtema", "idproyecto", "nombre", "created_at"];

    public function getTemas() {
        return $this->findAll();
    }

    public function getTema($idtema) {
        return $this->where("idtema", $idtema)->first();
    }

    public function eliminarTema($idtema) {
        return $this->delete($idtema);
    }

    public function guardarTema($idtema, $nombre) {
        if ($idtema == 0) {
            return $this->insert(["nombre" => $nombre]);
        } else {
            return $this->update($idtema, ["nombre" => $nombre]);
        }
    }

}