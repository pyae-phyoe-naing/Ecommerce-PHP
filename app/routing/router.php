<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

// $router->setBasePath('/PHP-Ecommerce/public'); // If error, not call custom-domain , call localhost this set.

$router->map('GET','/test','\App\Controllers\IndexController@welcome','Test Route');

new RouteDispatcher($router);
