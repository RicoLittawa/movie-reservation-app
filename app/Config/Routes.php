<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Content
$routes->get('/', 'MovieHomeController::index', ['filter' => 'login']);
$routes->get('/create', 'MovieHomeController::display', ['filter' => 'login']);
$routes->get('/view', 'ViewCustomersController::index', ['filter' => 'login']);

//Process Routes
$routes->post('/create', 'MovieHomeController::save');
$routes->match(['get', 'post'], '/update/(:num)', 'ViewCustomersController::update/$1', ['as' => 'update_reservation']);
$routes->match(['get', 'post'], '/confirm-delete/(:num)', 'ViewCustomersController::confirmDelete/$1', ['as' => 'delete_confirmation']);
$routes->get('/delete/(:num)', 'ViewCustomersController::delete/$1', ['as' => 'delete_reservation']);

//Login
$routes->get('/login', 'LoginController::index', ['filter' => 'noauth']);
$routes->post('/login', 'LoginController::submit');
$routes->get('/logout', 'LoginController::logout');
