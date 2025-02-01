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
     * ? Funcion para cargar la vista del test de ansiedad
     * @return void
     */
    public function test_ansiedad()
    {
        //? cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta de ansiedad
        $preguntas = $preguntasModel->obtener_preguntas('2');
        $this->vista('test/test_ansiedad', ['preguntas' => $preguntas]);
    }

    /**
     * ? Funcion para cargar la vista del test de depresion
     * @return void
     */
    public function test_depresion()
    {
        //? cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Obtener las preguntas de la encuesta de depresion
        $preguntas = $preguntasModel->obtener_preguntas('3');
        $this->vista('test/test_depresion', ['preguntas' => $preguntas]);
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

    /**
     * ? Funcion para guardar los datos de la encuesta de ansiedad
     * @return void
     */
    public function encuesta_ansiedad()
    {
        //? Recoger las respuestas del formulario
        $respuestas = $this->request->getPost('respuestas');

        //? Verificar si todas las respuestas fueron proporcionadas
        foreach ($respuestas as $respuesta) {
            if (!isset($respuesta['puntaje'])) {  // Cambiado empty() por !isset()
                return json_encode(['resp' => 0, 'msg' => 'Hay preguntas sin responder']);
            }
        }

        //? Extraer el Id de la variable session
        $usuario = session()->get('usuario');

        //? Cargar el modelo de preguntas
        $preguntasModel = new Preguntas_tests_model();

        //? Calcular el puntaje total correctamente
        $puntaje_total = 0;  // Inicializar correctamente antes del bucle
        foreach ($respuestas as $respuesta) {
            $puntaje_total += $respuesta['puntaje'];
        }

        //? Determinar el nivel de ansiedad
        if ($puntaje_total >= 0 && $puntaje_total <= 4) {
            $nivel_resultado = 'Mínimo o no ansiedad';
        } elseif ($puntaje_total >= 5 && $puntaje_total <= 10) {
            $nivel_resultado = 'Ansiedad al borde';
        } elseif ($puntaje_total >= 11 && $puntaje_total <= 20) {
            $nivel_resultado = 'Ansiedad leve';
        } elseif ($puntaje_total >= 21 && $puntaje_total <= 30) {
            $nivel_resultado = 'Ansiedad Moderada';
        } elseif ($puntaje_total >= 31 && $puntaje_total <= 50) {
            $nivel_resultado = 'Ansiedad Grave';
        } else {
            $nivel_resultado = 'Ansiedad Extrema-pánico';
        }

        //? Guardar las respuestas en la base de datos
        $data = [
            'id_usuario' => $usuario->id_usuario,
            'tipo' => '3',
            'puntaje_total' => $puntaje_total,
            'nivel_resultado' => $nivel_resultado
        ];

        $preguntasModel->guardar_respuestas_burns($data);

        //? Actualizar la fecha de la encuesta en la tabla pruebas_burns
        $preguntasModel->actualizar_fecha_encuesta($usuario->id_usuario, date('Y-m-d'));

        //? Retornar la respuesta
        return json_encode(['resp' => 1, 'msg' => 'Respuestas guardadas correctamente']);
    }

    //? Funcion para cargar la vista de seleccion de test
    public function seleccion_test()
    {
        $this->vista('test/seleccion_test');
    }
}
