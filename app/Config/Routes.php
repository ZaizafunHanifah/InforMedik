<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to('/register');
});


// --- Auth Routes ---
$routes->match(['get', 'post'], 'register', 'AuthController::register');
$routes->match(['get', 'post'], 'login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// --- Kuesioner Routes (Butuh Login) ---
$routes->get('kuesioner', 'KuesionerController::index', ['filter' => 'auth']);
$routes->post('kuesioner/submit', 'KuesionerController::submit', ['filter' => 'auth']);
