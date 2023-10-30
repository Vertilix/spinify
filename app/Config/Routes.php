<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::login');
$routes->post('login', 'Login::login');
$routes->get('login/register', 'Login::register');
$routes->post('login/register', 'Login::register');