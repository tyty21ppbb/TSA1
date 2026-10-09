<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TaskController::index');
$routes->get('profile', 'TaskController::profile');
$routes->get('about', 'TaskController::about');
$routes->get('welcome', 'TaskController::welcome');

// Authentication Routes
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::storeRegister');
$routes->get('logout', 'AuthController::logout');

// Public Task List View
$routes->get('tasks', 'TaskController::index');

// Protected Task CRUD Routes (Requires Login)
$routes->group('tasks', ['filter' => 'auth'], function($routes) {
    $routes->get('new', 'TaskController::new');
    $routes->post('create', 'TaskController::create');
    $routes->get('edit/(:num)', 'TaskController::edit/$1');
    $routes->post('update/(:num)', 'TaskController::update/$1');
    $routes->get('delete/(:num)', 'TaskController::delete/$1'); // Soft delete (is_archived = 1)
});