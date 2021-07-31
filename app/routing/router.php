<?php
$router = new AltoRouter();

// $router->setBasePath('/PHP-Ecommerce/public'); // If error, not call custom-domain , call localhost this set.

$router->map('GET','/test','BaseController@index','Test Route');
$router->map('GET','/product/[i:id]/[a:name]','BaseController@eg','Product Route');
$match = $router->match();
if($match){
    echo 'match';
    echo '<pre>'.print_r($match,true).'</pre>';
}else{
    echo 'not match';
}