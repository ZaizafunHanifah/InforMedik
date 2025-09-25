<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to('/register');
});
$routes->post('/', 'AuthController::register');

// Dashboard (butuh login)
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);

// History kuesioner
$routes->get('kuesioner/history', 'KuesionerController::history', ['filter' => 'auth']);

// --- Auth Routes ---
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');
$routes->get('register_post', function() { echo 'controller hit POST'; });
$routes->post('register_post', function() { echo 'controller hit POST'; });
$routes->post('register2', 'AuthController::register');
$routes->match(['GET', 'POST'], 'login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// --- Kuesioner Routes (Butuh Login) ---
$routes->get('kuesioner', 'KuesionerController::index', ['filter' => 'auth']);
$routes->post('kuesioner/submit', 'KuesionerController::submit', ['filter' => 'auth']);

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes){
    $routes->get('login', 'AdminController::login_form');
    $routes->post('login', 'AdminController::login');
    $routes->get('dashboard', 'AdminController::dashboard' /*, ['filter'=>'adminAuth'] */);
    $routes->get('logout', 'AdminController::logout');
});

$routes->get('testdb', 'TestDB::index');

