<?php

namespace App\Models;

use CodeIgniter\Model;

class Encuesta_inicial_model extends Model
{

    protected $tabla = 'encuesta_inicial';
    protected $id_encuesta = 'id_encuesta';
    protected $campos = ['id_usuario', 'id_encuesta', 'respuesta', 'fecha_encuesta'];

}