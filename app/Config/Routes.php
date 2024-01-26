<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home
$routes->get('/', 'Home::index');

// Upload
$routes->get('upload', 'Upload::index');

// Login
$routes->get('login', 'Auth::loginIndex');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');

// Search for a song
$routes->post('search', 'Home::navSearch');
