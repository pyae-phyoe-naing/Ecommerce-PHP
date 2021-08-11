<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

// $router->setBasePath('/PHP-Ecommerce/public'); // If error, not call custom-domain , call localhost this set.

$router->map('GET','/','\App\Controllers\IndexController@welcome','Welcome Route');

$router->map('GET','/admin','\App\Controllers\AdminController@index','Admin Home Route');

$router->map('GET','/admin/category','\App\Controllers\CategoryController@index','Category Home Route');
$router->map('GET','/admin/category/create','\App\Controllers\CategoryController@create','Category Create Route');
$router->map('POST','/admin/category/create','\App\Controllers\CategoryController@store','Category Store Route');
$router->map('GET','/admin/category/[i:id]/delete','\App\Controllers\CategoryController@destroy','Category Delete Route');


new RouteDispatcher($router);
