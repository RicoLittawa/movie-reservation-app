<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Get Methods
$routes->get('/', 'MovieHomeController::index');
$routes->get('/create/add-reservation', 'MovieHomeController::display');
$routes->get('/login/login-page', 'AdminLoginController::index');
$routes->get('/customers/list-customers', 'ViewCustomersController::index', ['as' => 'view_customers']);

//Post Methods
$routes->post('/create/add-reservation', 'MovieHomeController::save');

$routes->match(['get', 'post'], '/update/update-reservation/(:num)', 'ViewCustomersController::update/$1', ['as' => 'update_reservation']);
$routes->match(['get', 'post'], '/delete/delete-reservation/(:num)', 'ViewCustomersController::confirmDelete/$1', ['as' => 'delete_confirmation']);
$routes->match(['get', 'post'], '/delete/(:num)', 'ViewCustomersController::delete/$1', ['as' => 'delete_reservation']);
