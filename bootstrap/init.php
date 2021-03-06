<?php

use App\Classes\Database;
use App\Classes\ErrorHandler;

if(!isset($_SESSION)) session_start();

define('APP_ROOT',realpath(__DIR__.'/../'));  ## /../ is exist one layer from current folder config

define("URL_ROOT","http://shop.me/");

require_once APP_ROOT.'/vendor/autoload.php';  ## can use library from autoload in call

new ErrorHandler();

require_once APP_ROOT.'/app/config/_env.php';

new Database();

require_once APP_ROOT.'/app/routing/router.php';



