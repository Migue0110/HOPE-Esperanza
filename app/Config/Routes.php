<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//! Rutas para el controlador de home
//? Funcion index
$routes->get('pagina_principal', 'Home::pagina_principal');

//! Rutas para el controlador de Usuarios
//? Funcion registrar
$routes->post('usuarios/registrar', 'Usuarios::registrar');

//! Rutas para el controlador de Login
//? Funcion iniciar_sesion
$routes->post('login/iniciar_sesion', 'Login::iniciar_sesion');
//? Funcion salir
$routes->get('login/salir', 'Login::salir');

//! Rutas para el controlador de Test
//? Funcion test_inicial
$routes->get('test/test_inicial', 'Test::test_inicial');

//! Rutas para paginas no encontradas
//? Funcion 404
$routes->set404Override(function() {
    echo view('errors/html/error_404');
});