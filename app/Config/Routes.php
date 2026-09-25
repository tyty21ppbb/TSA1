<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home page: Today's Tasks
$routes->get('/', 'TaskController::index');

// All Tasks page
$routes->get('tasks', 'TaskController::allTasks');

// Task actions
$routes->post('tasks/add', 'TaskController::add');
$routes->get('tasks/toggle/(:num)', 'TaskController::toggleStatus/$1');

// Profile & About pages
$routes->get('profile', 'UserController::profile');
$routes->get('about', 'TaskController::about');
