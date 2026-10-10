<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Tasks::index');
$routes->get('tasks', 'Tasks::all');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');
