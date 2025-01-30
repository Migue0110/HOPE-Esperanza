<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//! Rutas para el controlador de home
//? Funcion index
$routes->get('pagina_principal', 'Home::pagina_principal');
//? Funcion calendario
$routes->get('calendario', 'Home::calendario');
//? Funcion analizador_textos
$routes->get('analizador_textos', 'Home::analizador_textos');
//? Funcion autoayuda
$routes->get('auto_ayuda', 'Home::autoayuda');
//? Funcion tests
$routes->get('tests', 'Home::tests');
//? funcion testsBurns
$routes->get('Test/test_ansiedad', 'Test::test_ansiedad');
//? funcion test_depresion
$routes->get('Test/test_depresion', 'Test::test_depresion');

//! Rutas para el controlador de Usuarios
//? Funcion registrar
$routes->post('usuarios/registrar', 'Usuarios::registrar');

//! Rutas para el controlador de Login
//? Funcion iniciar_sesion
$routes->post('login/iniciar_sesion', 'Login::iniciar_sesion');
//? Funcion salir
$routes->get('login/salir', 'Login::salir');
//? Funcion Olvide_contrasena
$routes->get('login/olvide_contrasena', 'Login::olvide_contrasena');
//? Funcion sendResetLink
$routes->post('login/enviarLinkRestablecer', 'Login::enviarLinkRestablecer');
//? Funcion resetPassword
$routes->post('login/restablecerContrasena', 'Login::restablecerContrasena');

//! Rutas para el controlador de Test
//? Funcion test_inicial
$routes->get('test/test_inicial', 'Test::test_inicial');
//? Funcion encuesta_inicial
$routes->post('test/encuesta_inicial', 'Test::encuesta_inicial');
//? Funcion encuesta_ansiedad
$routes->post('test/encuesta_ansiedad', 'Test::encuesta_ansiedad');

//! Rutas para paginas no encontradas
//? Funcion 404
$routes->set404Override(function() {
    echo view('errors/html/error_404');
});
