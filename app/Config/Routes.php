<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Get Methods
$routes->get('/', 'MovieHomeController::index');
$routes->get('/create/add-reservation', 'MovieHomeController::display');
$routes->get('/login/login-page', 'AdminLoginController::index');
// $routes->get('form', 'MovieHomeController::save');


//Post Methods
$routes->post('create/add-reservation', 'MovieHomeController::save');
$routes->post('/', 'MovieHomeController::index');

