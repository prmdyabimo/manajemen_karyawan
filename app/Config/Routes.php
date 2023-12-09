<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');

// EMPLOYEE
$routes->get('/', 'EmployeeController::index');
$routes->post('/store', 'EmployeeController::store');
$routes->get('/show/(:num)', 'EmployeeController::show/$1');
$routes->get('/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('/update/(:num)', 'EmployeeController::update/$1');
$routes->get('/delete/(:num)', 'EmployeeController::delete/$1');
