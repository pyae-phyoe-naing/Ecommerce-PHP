<?php

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Classes\CSRFToken;


class CategoryController extends BaseController
{
    public function index()
    {
        return view('admin/category/index');
    }
    public function create()
    {
        return view('admin/category/create');
    }
    public function store(){
        $request = Request::get('key_post');
        $token = $request->_token ;
        // Session::remove('token');
       if(CSRFToken::checkToken($token)){
           echo 'success';
       }else{
           echo '419 Page Expire.';
       }
    }
}
