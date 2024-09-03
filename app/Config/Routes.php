<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Auth::index');
$routes->post('/login/action', 'Auth::loginAction');
$routes->get('/register', 'Auth::register');
$routes->post('/register/action', 'Auth::registerAction');
$routes->get('/logout', 'Auth::logout');

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/task', 'Task::index', ['filter' => 'auth']);
$routes->get('/task/create', 'Task::create', ['filter' => 'auth']);