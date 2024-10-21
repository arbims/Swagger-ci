<?php

namespace Swagger\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', ['namespace' => 'Swagger\Controllers'], function($routes) { 
    $routes->get('/swagger_json', 'SwaggerDocController::swagger');
    $routes->get('/api/doc', 'SwaggerDocController::index');
    $routes->get('/api/demo', 'SwaggerDocController::demo');
});