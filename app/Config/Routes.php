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
$routes->get('login', 'Login::login');
$routes->post('login', 'Login::login');
$routes->get('logout', 'Login::logout');
$routes->get('register', 'Login::register');
$routes->post('register', 'Login::register');

// Search for a song
$routes->post('search', 'Home::navSearch');
