<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AnalizadorController extends Controller
{
    public function analizarSentimiento()
    {
        //? Obtener el comentario del formulario
        $comentario = $this->request->getPost('comentario');
        
        // Ruta del script Python
        $script = RUTA_BASE . 'app/Scripts/api.py';
        
        $command = "python3 $script '$comentario'";
        $output = shell_exec($command);

        // Procesar la respuesta
        $response = json_decode($output, true);

        // Mostrar el sentimiento
        if ($response && isset($response['Sentimiento'])) {
            return view('analizador_view', ['sentimiento' => $response['Sentimiento']]);
        } else {
            return view('error_view', ['error' => 'Hubo un problema al procesar el comentario']);
        }
    }
}