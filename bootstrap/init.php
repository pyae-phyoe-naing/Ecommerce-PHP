<?php

if(!isset($_SESSION)) session_start();

define('APP_ROOT',realpath(__DIR__.'/../'));  ## /../ is exist one layer from current folder config

require_once APP_ROOT.'/vendor/autoload.php';  ## can use library from autoload in call

require_once APP_ROOT.'/app/config/_env.php';

require_once APP_ROOT.'/app/routing/router.php';