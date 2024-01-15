<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('Mensaje/', 'Home::Mensaje');
$routes->get('ProductosLimpieza/', 'Home::ProductosLimpieza');
$routes->get('ProductosLimpiezaLista/', 'Home::ProductosLimpiezaLista');

$routes->get('inserta/(:any)', 'Home::inserta/$1');
$routes->post('actualiza/(:num)', 'Home::actualiza/$1');
$routes->get('selecciona/(:num)', 'Home::selecciona/$1');
$routes->delete('elimina/(:num)', 'Home::elimina/$1');

