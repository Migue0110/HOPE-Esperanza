<?php

namespace App\Controllers;

//? Importar el modelo de usuarios
use App\Models\Usuarios_model;

class Usuarios extends BaseController
{
    /**  
     * ? Funcion para registrar un usuario en la base de datos
     * @return void
     */
     public function registrar(){

          // Obtener los datos enviados por AJAX
          $nombre = $this->request->getPost('nombre');
          $correo = $this->request->getPost('correo');
          $contrasena = $this->request->getPost('contrasena');
          $confirmarContrasena = $this->request->getPost('confirmar_contrasena');
          $edad = $this->request->getPost('edad');
          $telefono = $this->request->getPost('telefono');
          
          //? Crear el objeto con los datos
          $datos = [
               'nombre_usuario' => $nombre,
               'correo' => $correo,
               'contrasena' => $contrasena,
               'edad' => $edad,
               'telefono' => $telefono
          ];

          //? Crear el objeto del modelo
          $usuarios_model = new Usuarios_model();

          //? Llamar a la funcion del modelo
          $usuarios_model->registrar($datos);

          //? Retornar la respuesta
          return json_encode(['resp' => 1, 'msg' => 'Usuario registrado correctamente']);
     }
}