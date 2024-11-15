<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('dashboard', 'dashboard::index');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('/admin/(:any)', 'Admin::detail/$1', ['filter' => 'role:admin,superadmin']);
$routes->get('admin', 'Admin::userList', ['filter' => 'role:admin,superadmin']);




$routes->setAutoRoute(true);