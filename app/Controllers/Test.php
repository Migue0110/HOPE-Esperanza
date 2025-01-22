<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;
use App\Models\Preguntas_tests_model;
use App\Models\Usuarios_model;
use App\Models\Encuesta_inicial_model;

class Test extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Cargar la clase de sesión en el constructor
        $this->session = \Config\Services::session();

        // if (empty($this->session->datosusuario->correo)) {
        //     return redirect()->to(base_url('public/login'));
        // }
    }

    public function test_inicial ()
    {
        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta inicial
        $preguntas = $preguntasModel->obtener_preguntas('1');
        $this->vista('test/test_inicial', ['preguntas' => $preguntas]);
    } 
}