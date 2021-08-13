<?php

use Philo\Blade\Blade;
use voku\helper\Paginator;


function view($path, $data=[]){
    $view = APP_ROOT.'/resources/views';
    $cache = APP_ROOT.'/bootstrap/cache';

    $blade = new Blade($view,$cache);
    echo $blade->view()->make($path,$data)->render();
}
function paginate($num_of_record,$total_record,$object){

   $pages = new Paginator($num_of_record,'p');
   $pages->set_total($total_record);
   $dataArr = $object->genPaginate($pages->get_limit());

   return [$dataArr,$pages->page_links()];
}
function make($filename,$data){
  extract($data); // $content,$filename,$to .. etc
  ob_start(); // ob off and redenr view file but not show this place between
   require_once APP_ROOT."/resources/views/mails/".$filename.'.blade.php'; // mean => mail blade file copy here so in this echo $content
   $content = ob_get_contents(); // mean => Get ob_get_content the whole mail.blade file push $content
   ob_end_clean();
   return $content;
}
function slug($data){
  $data = preg_replace('/[^' .preg_quote('_'). '\pL\pN\s]+/u',"",mb_strtolower($data));
  $data = preg_replace('/[ _]+/u','-',$data);
  return $data;
}
function asset($path){
  echo URL_ROOT.'assets/'.$path;
}

function beautify($data){
  echo "<pre>".print_r($data,true)."</pre>";
}

function dd($data)
{
   die(var_dump($data));
}