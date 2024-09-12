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


$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'Home::index');
});

$routes->group('task', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'Task::index'); 
    $routes->get('create', 'Task::create');
    $routes->post('save', 'Task::save'); 
    $routes->post('delete/(:num)', 'Task::delete/$1');
    $routes->get('detail/(:segment)', 'Task::detail/$1');
    $routes->get('edit/(:segment)', 'Task::edit/$1');
    $routes->post('update/(:segment)', 'Task::update/$1');
});

$routes->group('category', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'Category::index'); 
    $routes->get('create', 'Category::create'); 
    $routes->post('save', 'Category::save'); 
    $routes->get('delete/(:num)', 'Category::delete/$1');
});