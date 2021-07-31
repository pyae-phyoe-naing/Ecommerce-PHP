<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

// $router->setBasePath('/PHP-Ecommerce/public'); // If error, not call custom-domain , call localhost this set.

$router->map('GET','/','\App\Controllers\IndexController@welcome','Welcome Route');

new RouteDispatcher($router);
