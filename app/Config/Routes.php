<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::testDB');
$routes->get('/layout', 'Home::testLayout');

/**
 * test fetch apline
 */
$routes->get('posts', 'Clients::index');
$routes->get('posts/fetch', 'Clients::fetch');

// api
$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->resource('ClientsApi');
});

service('auth')->routes($routes);
