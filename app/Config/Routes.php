<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home
$routes->get('/', 'IndexController::index');

// Upload
$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::uploadSong');

// Login
$routes->get('login', 'AuthController::loginIndex');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('register', 'AuthController::registerIndex');
$routes->post('register', 'AuthController::register');

// Search for a song
$routes->post('search', 'IndexController::navSearch');
