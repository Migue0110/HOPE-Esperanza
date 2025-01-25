<?php

namespace App\Models;

use CodeIgniter\Model;

class Preguntas_tests_model extends Model
{

    protected $table = 'preguntas_tests';
    protected $tabla_intermedia = 'usuarios_preguntas';
    protected $id = 'id';

    /**
     * ? funcion para traer las preguntas dependiendo la encuesta
     * @param enum $encuesta
     * @return object
     */
    public function obtener_preguntas($encuesta){
        return $this->db->table($this->table)
            ->where('encuesta', $encuesta)
            ->get()
            ->getResult();
    }

    /**
     * ? funcion para guardar las respuestas dependiendo la encuesta
     * @param array $data
     * @return void
     */
    public function guardar_respuestas($data){
        $this->db->table($this->tabla_intermedia)->insert($data);
    }
}
