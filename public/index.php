<?php
use Illuminate\Database\Capsule\Manager as Capsule;
require_once '../bootstrap/init.php';

$users = Capsule::table('users')->where('id',1)->get();
print_r($users);