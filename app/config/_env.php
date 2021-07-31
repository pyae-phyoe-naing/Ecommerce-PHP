<?php
define('APP_ROOT',realpath(__DIR__.'/../../'));  ## /../ is exist two layer from current folder config

require_once APP_ROOT.'/vendor/autoload.php';  ## can use library from autoload in call

$dotEnv = \Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotEnv->load();