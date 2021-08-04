<?php


namespace App\Controllers;


class IndexController extends BaseController
{
   public  function welcome(){
       return view('welcome');
   }

}