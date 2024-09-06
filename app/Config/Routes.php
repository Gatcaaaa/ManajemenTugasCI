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
    // Tambahkan route lain seperti edit, delete jika diperlukan
});

$routes->group('category', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'Category::index'); 
    $routes->get('create', 'Category::create'); 
    $routes->post('save', 'Category::save'); 
    // Tambahkan route lain jika ada aksi lebih lanjut
});