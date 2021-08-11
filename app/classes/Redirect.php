<?php
namespace App\Classes;

class Redirect{
    public static function to($page,$session=[]){
      if(count($session) > 0){
        Session::put($session[0],$session[1]);
      }
        header("Location:$page");
    }
    public static function back(){
      $uri = $_SERVER['REQUEST_URI'];
      header("Location:$uri");

    }
}