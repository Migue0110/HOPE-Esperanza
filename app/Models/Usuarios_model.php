<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{

    protected $table = 'usuarios';
    protected $id = 'id';

    /**
     * ? Funcion para registrar un usuario en la base de datos
     * @param array $datos
     * @return void
     */
    public function registrar($datos)
    {
        $this->db->table($this->table)->insert($datos);
    }

    /**
     * ? Funcion para traer un usuario por su correo
     * @param string $correo
     * @return object
     */
    public function obtener_usuario($correo)
    {
        return $this->db->table($this->table)
            ->where('correo', $correo)
            ->get()
            ->getRow();
    }

    /**
     * ? Funcion para actualizar un usuario
     * @param array $datos
     * @param int $id
     * @return void
     */
    public function actualizar_usuario($datos, $id)
    {
        $this->db->table($this->table)
            ->where($this->id, $id)
            ->update($datos);
    }
}
