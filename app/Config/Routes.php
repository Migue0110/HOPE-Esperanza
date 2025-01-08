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

//! Rutas para paginas no encontradas
//? Funcion 404
$routes->set404Override(function() {
    echo view('errors/html/error_404');
});