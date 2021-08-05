<?php

namespace App\Controllers;

use App\classes\FileUpload;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $category = Category::all();
        return view('admin/category/index',compact('category'));
    }
    public function create()
    {
        return view('admin/category/create');
    }
    public function store()
    {
        $request = Request::get('key_post');
        $file = Request::get('key_file');
        $token = $request->_token;
        // Session::remove('token');
        if (CSRFToken::checkToken($token)) {
            $fileUpload = new FileUpload();
             echo ($fileUpload->move($file));
        } else {
            Session::flash('error', 'CSRF attack occur!');
            Redirect::back();
        }
    }
}
