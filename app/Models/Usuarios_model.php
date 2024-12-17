<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    /**
     * ? Funcion para registrar un usuario en la base de datos
     * @param array $datos
     * @return void
     */
    public function registrar($datos){
        $this->db->table($this->table)->insert($datos);
    }
}