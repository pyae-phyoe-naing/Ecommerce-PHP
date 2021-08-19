<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

// $router->setBasePath('/PHP-Ecommerce/public'); // If error, not call custom-domain , call localhost this set.

$router->map('GET','/','\App\Controllers\IndexController@welcome','Welcome Route');
$router->map('GET','/cart','\App\Controllers\IndexController@showCart','Show Cart Route');
$router->map('POST','/cart','\App\Controllers\IndexController@cart','Cart Route');
$router->map('GET','/order/confirm','\App\Controllers\IndexController@orderConfirm','Order Confirm Route');
$router->map('POST','/checkout','\App\Controllers\IndexController@checkOut','CheckOut Route');
$router->map('GET','/success/[a:key]/order','\App\Controllers\IndexController@successOrder','Order Success Route');

$router->map('GET','/product/[i:id]/detail','\App\Controllers\ProductController@productDeatil','Product Detail');

require_once 'user_route.php';
require_once 'admin_route.php';

new RouteDispatcher($router);
