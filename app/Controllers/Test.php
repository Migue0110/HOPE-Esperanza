<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;
use CodeIgniter\Controller;
use App\Models\Preguntas_tests_model;
use App\Models\Usuarios_model;

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

    /**
     * ? Funcion para cargar la vista de la encuesta inicial
     * @return void
     */
    public function test_inicial()
    {
        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta inicial
        $preguntas = $preguntasModel->obtener_preguntas('1');
        $this->vista('test/test_inicial', ['preguntas' => $preguntas]);
    }

    /**
     * ? Funcion para guardar los datos de la encuesta inicial
     * @return void
     */
    public function encuesta_inicial()
    {
        //? Recoger las respuestas del formulario
        $respuestas = $this->request->getPost('respuestas');

        //? Verificar si todas las respuestas fueron proporcionadas
        foreach ($respuestas as $respuesta) {
        if (empty($respuesta['puntaje'])) {
            return json_encode(['resp' => 0, 'msg' => 'Hay preguntas sin responder']);
        }
    }
        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Guardar las respuestas en la base de datos
        $puntaje_total = 0;
        foreach ($respuestas as $respuesta) {
            $data = [
                'id_usuario' => $usuario->id_usuario,
                'id_pregunta' => $respuesta['id_pregunta'],
                'puntaje' => $respuesta['puntaje']
            ];
            $puntaje_total += $respuesta['puntaje'];
            $preguntasModel->guardar_respuestas($data);
        }

        //? Actualizar la fecha de la encuesta en la tabla usuarios
        $usuariosModel = new Usuarios_model();
        $usuariosModel->actualizar_fecha_encuesta($usuario->id_usuario, date('Y-m-d'));
        
        //? Retornar la respuesta
        return json_encode(['resp' => 1, 'msg' => 'Respuestas guardadas correctamente', 'puntaje' => $puntaje_total]);
    }


}