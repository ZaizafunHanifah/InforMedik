<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to('/register');
});

// Dashboard (butuh login)
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);

// History kuesioner
$routes->get('kuesioner/history', 'KuesionerController::history', ['filter' => 'auth']);

// --- Auth Routes ---
$routes->match(['GET', 'POST'], 'register', 'AuthController::register');
$routes->match(['GET', 'POST'], 'login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// --- Kuesioner Routes (Butuh Login) ---
$routes->get('kuesioner', 'KuesionerController::index', ['filter' => 'auth']);
$routes->post('kuesioner/submit', 'KuesionerController::submit', ['filter' => 'auth']);
