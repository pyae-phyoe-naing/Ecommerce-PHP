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
$router->map('POST','/admin/category/[i:id]/unique','\App\Controllers\CategoryController@unique','Category Unique Route');
$router->map('POST','/admin/category/[i:id]/update','\App\Controllers\CategoryController@update','Category Update Route');

$router->map('GET','/admin/subcat','\App\Controllers\SubCatController@index','SubCat Home Route');
$router->map('POST','/admin/subcat/create','\App\Controllers\SubCatController@store','SubCat Store Route');
$router->map('GET','/admin/subcat/[i:id]/delete','\App\Controllers\SubCatController@destroy','SubCat Delete Route');
$router->map('POST','/admin/subcat/[i:id]/update','\App\Controllers\SubCatController@update','SubCat Update Route');

$router->map('GET','/admin/product','\App\Controllers\ProductController@index','Product Home Route');
$router->map('GET','/admin/product/create','\App\Controllers\ProductController@create','Product Create Route');
$router->map('POST','/admin/product/create','\App\Controllers\ProductController@store','Product Store Route');

new RouteDispatcher($router);
