<?php

use Philo\Blade\Blade;

function view($path, $data=[]){
    $view = APP_ROOT.'/resources/views';
    $cache = APP_ROOT.'/bootstrap/cache';

    $blade = new Blade($view,$cache);
    echo $blade->view()->make($path)->render();
}

function make($filename,$data){
  extract($data); // $content,$filename,$to .. etc
  ob_start(); // ob off and redenr view file but not show this place between
   require_once APP_ROOT."/resources/views/mails/".$filename.'.blade.php'; // mean => mail blade file copy here so in this echo $content
   $content = ob_get_contents(); // mean => Get ob_get_content the whole mail.blade file push $content
   ob_end_clean();
   return $content;
}